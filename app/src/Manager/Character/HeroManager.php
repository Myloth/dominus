<?php

namespace App\Manager\Character;

use App\Manager\AbstractManager;
use App\Service\Character\HeroService;

/**
 * Class HeroManager
 */
class HeroManager extends AbstractManager
{
    /**
     * @param HeroService $service
     */
    public function __construct(HeroService $service)
    {
        parent::__construct($service);
    }
}
