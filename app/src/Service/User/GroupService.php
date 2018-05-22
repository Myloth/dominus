<?php

namespace App\Service\User;

use App\Entity\User\Group;
use Doctrine\ORM\EntityRepository;

/**
 * Class GroupService
 */
class GroupService
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
        /** @var Group $group */
        foreach ($this->repository->findAll() as $group) {
            $results[$group->getId()] = $group->getLabel();
        }

        return $results;
    }
}