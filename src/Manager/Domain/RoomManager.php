<?php

namespace App\Manager\Domain;

use App\Manager\AbstractManager;
use App\Service\Domain\RoomService;

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
