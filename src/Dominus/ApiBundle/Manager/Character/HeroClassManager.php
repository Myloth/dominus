<?php

namespace Dominus\ApiBundle\Manager\Character;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Character\HeroClassService;

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
