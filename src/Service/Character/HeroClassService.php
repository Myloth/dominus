<?php

namespace App\Service\Character;

use App\Service\AbstractService;
use App\Entity\Character\HeroClass;

/**
 * Class HeroClassService
 */
class HeroClassService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return HeroClass::class;
    }
}
