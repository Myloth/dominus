<?php

namespace Dominus\ApiBundle\Service\Crafting;

use Dominus\ApiBundle\Service\AbstractService;
use Dominus\ModelBundle\Entity\Crafting\Material;

/**
 * Class MaterialService
 */
class MaterialService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return Material::class;
    }
}
