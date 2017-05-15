<?php

namespace Dominus\ApiBundle\Manager\Crafting;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Crafting\MaterialService;

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
