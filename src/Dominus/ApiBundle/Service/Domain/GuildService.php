<?php

namespace Dominus\ApiBundle\Service\Domain;

use Dominus\ApiBundle\Service\AbstractService;
use Dominus\ModelBundle\Entity\Domain\Guild;

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
