<?php

namespace Dominus\ApiBundle\Service\Domain;

use Dominus\ApiBundle\Service\AbstractService;
use Dominus\ModelBundle\Entity\Domain\Room;

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
