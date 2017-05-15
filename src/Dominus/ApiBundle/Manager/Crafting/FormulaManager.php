<?php

namespace Dominus\ApiBundle\Manager\Crafting;

use Dominus\ApiBundle\Manager\AbstractManager;
use Dominus\ApiBundle\Service\Crafting\FormulaService;

/**
 * Class FormulaManager
 */
class FormulaManager extends AbstractManager
{
    /**
     * @param FormulaService $service
     */
    public function __construct(FormulaService $service)
    {
        parent::__construct($service);
    }
}
