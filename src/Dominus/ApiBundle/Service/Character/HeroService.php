<?php

namespace Dominus\ApiBundle\Service\Character;

use Dominus\ApiBundle\Service\AbstractService;
use Dominus\ModelBundle\Entity\Character\Hero;

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
