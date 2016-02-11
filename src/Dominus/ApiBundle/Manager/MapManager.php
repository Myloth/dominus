<?php

namespace Dominus\ApiBundle\Manager;


use Dominus\ApiBundle\Service\CellularAutomataService;
use Dominus\ApiBundle\Service\MapGeneratorService;

class MapManager
{

    /** @var  MapGeneratorService */
    protected $mapGeneratorService;


    public function __construct(MapGeneratorService $mapGeneratorService)
    {
        $this->mapGeneratorService = $mapGeneratorService;
    }

    public function generateMap($ratio, $width, $height, $nbIterations)
    {
        $map = $this->mapGeneratorService->populateFirstMap($ratio, $width, $height);

        // Format map with Cellular Automata algorythm
        for($i = 0; $i < $nbIterations; $i++)
        {
            $map = $this->mapGeneratorService->iterate($map);
        }

        // Apply relief
        $map = $this->mapGeneratorService->applyRelief($map);

        return $map;
    }



}