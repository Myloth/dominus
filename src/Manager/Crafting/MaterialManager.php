<?php

namespace App\Manager\Crafting;

use App\Manager\AbstractManager;
use App\Service\Crafting\MaterialService;

/**
 * Class MaterialManager
 */
class MaterialManager extends AbstractManager
{
    /**
     * @param MaterialService $service
     */
    public function __constrcut(MaterialService $service)
    {
        parent::__construct($service);
    }
}
