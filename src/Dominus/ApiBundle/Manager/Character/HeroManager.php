<?php

namespace Dominus\ApiBundle\Manager\Character;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Character\HeroService;

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
