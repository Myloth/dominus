<?php

namespace App\Service\Crafting;

use App\Service\AbstractService;
use App\Entity\Crafting\Formula;

/**
 * Class Formula
 */
class FormulaService extends AbstractService
{

    /**
     * @return mixed
     */
    protected function getEntityClass()
    {
        return Formula::class;
    }
}
