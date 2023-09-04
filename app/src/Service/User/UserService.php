<?php

namespace App\Service\User;

use App\Entity\User\AbstractUser;
use App\Entity\User\ApiUser;
use App\Entity\User\Group;
use App\Entity\User\User;
use App\Form\DataHolder\User\CreateUser;
use App\Form\DataHolder\User\EditApiUser;
use App\Form\DataHolder\User\EditStandardUser;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class UserService
 */
class UserService
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->entityManager->getRepository(AbstractUser::class)->findAll();
    }

    /**
     * @param CreateUser $createUserDto
     *
     * @return User
     */
    public function createUser(CreateUser $createUserDto)
    {
        $user = $createUserDto->userType === AbstractUser::USER_TYPE_USER ? new User() : new ApiUser();
        $user->setUsername($createUserDto->username)
            ->setActive(false);

        $this->entityManager->persist($user);
        $this->entityManager->flush($user);

        return $user;
    }

    /**
     * @param AbstractUser $user
     * @param              $dto
     *
     * @return void
     */
    public function enrichUserData(AbstractUser $user, $dto)
    {
        if (($user instanceof ApiUser && !$dto instanceof EditApiUser) || ($user instanceof User && !$dto instanceof EditStandardUser)) {
            throw new \Exception("Wrong data type");
        }

        if ($user instanceof ApiUser) {
            $user->setSalt($dto->salt);
        } elseif ($user instanceof User) {
            $groupRepository = $this->entityManager->getRepository(Group::class);
            $groups = [];
            foreach ($dto->groups as $groupId) {
                $groups[] = $groupRepository->find($groupId);
            }

            $user->setPassword($dto->password)
                ->setEmail($dto->email)
                ->setGroups($groups);
        }

        $user->setActive($dto->active);

        $this->entityManager->persist($user);
        $this->entityManager->flush($user);
    }

    /**
     * @param int $length
     *
     * @return string
     */
    private function generateRandomHash(int $length): string
    {
        return bin2hex(random_bytes($length));
    }
}
