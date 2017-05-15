<?php

namespace Dominus\ApiBundle\Manager\Crafting;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Crafting\MaterialTypeService;

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
