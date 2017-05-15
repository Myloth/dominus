<?php

namespace Dominus\ApiBundle\Service\Crafting;

use Dominus\ApiBundle\Service\AbstractService;
use Dominus\ModelBundle\Entity\Crafting\Job;

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
