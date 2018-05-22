<?php

namespace App\Manager\Character;

use App\Manager\AbstractManager;
use App\Service\Character\HeroClassService;

/**
 * Class HeroClassManager
 */
class HeroClassManager extends AbstractManager
{
    /**
     * @param HeroClassService $service
     */
    public function __construct(HeroClassService $service)
    {
        parent::__construct($service);
    }
}
