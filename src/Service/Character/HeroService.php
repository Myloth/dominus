<?php

namespace App\Service\Character;

use App\Service\AbstractService;
use App\Entity\Character\Hero;

/**
 * Class HeroService
 */
class HeroService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return Hero::class;
    }
}
