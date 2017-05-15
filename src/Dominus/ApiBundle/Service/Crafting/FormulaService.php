<?php

namespace Dominus\ApiBundle\Service\Crafting;

use Dominus\ApiBundle\Service\AbstractService;
use Dominus\ModelBundle\Entity\Crafting\Formula;

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
