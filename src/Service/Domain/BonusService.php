<?php

namespace App\Service\Domain;

use App\Service\AbstractService;
use App\Entity\Domain\Bonus;

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
