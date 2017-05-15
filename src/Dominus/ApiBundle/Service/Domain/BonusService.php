<?php

namespace Dominus\ApiBundle\Service\Domain;

use Dominus\ApiBundle\Service\AbstractService;
use Dominus\ModelBundle\Entity\Domain\Bonus;

/**
 * Class BonusService
 */
class BonusService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return Bonus::class;
    }
}
