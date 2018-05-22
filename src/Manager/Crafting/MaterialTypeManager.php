<?php

namespace App\Manager\Crafting;

use App\Manager\AbstractManager;
use App\Service\Crafting\MaterialTypeService;

/**
 * Class MaterialTypeService
 */
class MaterialTypeManager extends AbstractManager
{
    /**
     * @param MaterialTypeService $service
     */
    public function __construct(MaterialTypeService $service)
    {
        parent::__construct($service);
    }
}
