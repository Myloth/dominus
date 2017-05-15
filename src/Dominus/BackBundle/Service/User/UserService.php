<?php

namespace Dominus\BackBundle\Service\User;

use Doctrine\ORM\EntityRepository;
use Dominus\BackBundle\Service\AbstractService;
use Knp\Component\Pager\Paginator;

/**
 * Class UserService
 */
class UserService extends AbstractService
{
    /**
     * @param Paginator        $paginator
     * @param EntityRepository $repository
     */
    public function __construct(Paginator $paginator, EntityRepository $repository)
    {
        parent::__construct($paginator);

        $this->repository = $repository;
    }
}
