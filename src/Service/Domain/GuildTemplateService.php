<?php

namespace App\Service\Domain;

use App\Entity\Domain\GuildTemplate;
use App\Service\AbstractService;

/**
 * Class GuildTemplateService
 */
class GuildTemplateService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return GuildTemplate::class;
    }
}
