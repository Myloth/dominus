<?php

namespace App\Manager;

use App\Service\AbstractService;

/**
 * Class AbstractManager
 */
abstract class AbstractManager
{
    /** @var AbstractService */
    protected $service;

    /**
     * @param AbstractService $service
     */
    public function __construct(AbstractService $service)
    {
        $this->service = $service;
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->service->find($id);
    }

    /**
     * @param array $parameters
     *
     * @return array
     */
    public function findBy(array $parameters)
    {
        return $this->service->findBy($parameters);
    }

    /**
     * @param array $parameters
     * @param array $sort
     *
     * @return mixed
     */
    public function findOneBy($parameters, $sort)
    {
        return $this->service->findOneBy($parameters, $sort);
    }
}
