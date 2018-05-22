<?php

namespace App\Service\Domain;

use App\Service\AbstractService;
use App\Entity\Domain\Room;

/**
 * Class RoomService
 */
class RoomService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return Room::class;
    }
}
