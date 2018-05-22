<?php

namespace App\Manager;

use App\Form\DataHolder\CreateAccount;
use App\Manager\Domain\GuildManager;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Util\UserManipulator;

/**
 * Class AccountManager
 */
class AccountManager
{
    /** @var UserManipulator */
    private $userManipulator;

    /**
     * @param UserManipulator $userManipulator
     */
    public function __construct(UserManipulator $userManipulator)
    {
        $this->userManipulator = $userManipulator;
    }

    /**
     * @param CreateAccount $dto
     *
     * @return UserInterface
     */
    public function createAccount(CreateAccount $dto)
    {
        return $this->userManipulator->create($dto->name, $dto->password, $dto->email, true, false);
    }
}
