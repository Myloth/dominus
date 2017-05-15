<?php

namespace Dominus\ApiBundle\Manager\Crafting;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Crafting\JobService;

/**
 * Class JobManager
 */
class JobManager extends AbstractManager
{
    /**
     * @param JobService $service
     */
    public function __construct(JobService $service)
    {
        parent::__construct($service);
    }
}
