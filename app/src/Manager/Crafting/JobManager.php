<?php

namespace App\Manager\Crafting;

use App\Manager\AbstractManager;
use App\Service\Crafting\JobService;

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
