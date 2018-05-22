<?php

namespace App\Service\User;

use App\Entity\User\Role;
use App\Service\AbstractService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class RoleService
 */
class RoleService
{
    /**
     * @var EntityRepository
     */
    private $repository;

    /**
     * @param EntityRepository $repository
     */
    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function getFormChoices(): array
    {
        $results = [];
        foreach ($this->repository->findAll() as $role) {
            $results[$role->getCode()] = $role->getCode();
        }

        return $results;
    }
}