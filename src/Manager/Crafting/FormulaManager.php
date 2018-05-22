<?php

namespace App\Manager\Crafting;

use App\Manager\AbstractManager;
use App\Service\Crafting\FormulaService;

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
