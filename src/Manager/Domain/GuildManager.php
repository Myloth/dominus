<?php

namespace App\Manager\Domain;

use App\Manager\AbstractManager;
use App\Service\Domain\GuildService;

/**
 * Class GuildManager
 */
class GuildManager extends AbstractManager
{
    /**
     * @param GuildService $service
     */
    public function __construct(GuildService $service)
    {
        parent::__construct($service);
    }
}
