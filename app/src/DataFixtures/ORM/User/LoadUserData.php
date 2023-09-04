<?php

namespace App\DataFixtures\ORM\User;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Statistics\PlayerStats;
use App\Entity\User\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;


class LoadUserData extends AbstractFixture
{
    /** @var UserPasswordHasherInterface */
    private $passwordHasher;

    /**
     * @param UserPasswordHasherInterface $passwordHasher
     */
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            "admin-user" => ['admin', 'test', 'test@example.com', 'group-super-admin', true],
        ];
    }

    /**
     * @return array
     */
    protected function getDevData()
    {
        return [
            'player' => ['Myloth', 'password', 'asensijoel@gmail.com', 'group-player', true],
        ];
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $user = (new User())
            ->setUsername($data[0])
            ->setEmail($data[2])
            ->setGroups([$this->getReference($data[3])])
            ->setActive($data[4])
        ;

        $hashedPassword = $this->passwordHasher->hashPassword($user, $data[1]);

        $user->setPassword($hashedPassword);

        return $user;
    }
}
