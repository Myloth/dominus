<?php

namespace App\Service\Crafting;

use App\Service\AbstractService;
use App\Entity\Crafting\Job;

/**
 * Class JobService
 */
class JobService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return Job::class;
    }
}
