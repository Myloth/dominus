<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\ORMException;

/**
 * Class AbstractService
 */
abstract class AbstractService
{
    /** @var EntityManager */
    protected $em;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return EntityRepository
     */
    protected function getRepository()
    {
        return $this->em->getRepository($this->getEntityClass());
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    /**
     * @param array $parameters
     *
     * @return array
     */
    public function findBy(array $parameters)
    {
        return $this->getRepository()->findBy($parameters);
    }

    /**
     * @param array $parameters
     * @param array $sort
     *
     * @return mixed
     */
    public function findOneBy($parameters, $sort)
    {
        return $this->getRepository()->findOneBy($parameters, $sort);
    }

    /**
     * @param \object $entity
     *
     * @throws ORMException
     */
    public function save($entity)
    {
        $this->em->persist($entity);
        $this->em->flush($entity);
    }

    /**
     * @return mixed
     */
    abstract protected function getEntityClass();
}
