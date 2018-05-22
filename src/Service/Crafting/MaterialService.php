<?php

namespace App\Service\Crafting;

use App\Service\AbstractService;
use App\Entity\Crafting\Material;

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
