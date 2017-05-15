<?php

namespace Dominus\ApiBundle\Manager\Domain;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Domain\BonusService;

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
