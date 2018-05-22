<?php

namespace App\Service\Domain;

use App\Service\AbstractService;
use App\Entity\Domain\Guild;

/**
 * Class GuildService
 */
class GuildService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return Guild::class;
    }
}
