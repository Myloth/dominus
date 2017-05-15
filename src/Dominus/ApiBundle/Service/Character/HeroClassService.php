<?php

namespace Dominus\ApiBundle\Service\Character;

use Dominus\ApiBundle\Service\AbstractService;
use Dominus\ModelBundle\Entity\Character\HeroClass;

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
