<?php

namespace App\Service\User;

use App\Repository\UserRepository;

/**
 * Class UserService
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private  $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->userRepository->findAll();
    }
}
