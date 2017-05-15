<?php

namespace Dominus\ApiBundle\Manager\Domain;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Domain\GuildService;

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
