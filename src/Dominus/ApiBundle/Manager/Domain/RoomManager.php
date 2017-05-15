<?php

namespace Dominus\ApiBundle\Manager\Domain;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Domain\RoomService;

/**
 * Class RoomManager
 */
class RoomManager extends AbstractManager
{
    /**
     * @param RoomService $service
     */
    public function __construct(RoomService $service)
    {
        parent::__construct($service);
    }
}
