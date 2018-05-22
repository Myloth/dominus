<?php

namespace App\Manager\Domain;

use App\Manager\AbstractManager;
use App\Service\Domain\BonusService;

/**
 * Class BonusManager
 */
class BonusManager extends AbstractManager
{
    /**
     * @param BonusService $service
     */
    public function __construct(BonusService $service)
    {
        parent::__construct($service);
    }
}
