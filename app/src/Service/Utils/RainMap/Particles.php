<?php

namespace App\Service\Utils\RainMap;

/**
 * Class Particles.
 */
class Particles
{
    /** @var int  */
    protected $stabilityRadius = 1;

    public function __construct($stabilityRadius)
    {
        $this->stabilityRadius = $stabilityRadius;
    }

    /**
     * @param array $heightMap
     * @param int   $x
     * @param int   $y
     * @param int   $sizeX
     */
    public function drop(array &$heightMap, $x, $y, $sizeX)
    {
        $dropPoint = round($x + $y * $sizeX);

        if ($heightMap[$dropPoint] == 0) {
            $heightMap[$dropPoint] += 1;
        } else {
            $this->agitate($heightMap, $x, $y, $sizeX, $dropPoint);
        }
    }

    /**
     * @param array $heightMap
     * @param int   $x
     * @param int   $y
     * @param int   $sizeX
     * @param int   $dropPoint
     */
    private function agitate(array &$heightMap, $x, $y, $sizeX, $dropPoint)
    {
        $lowerNeighbors = [];

        $xRange = range($x - $this->stabilityRadius, $x + $this->stabilityRadius);
        $yRange = range($y - $this->stabilityRadius, $y + $this->stabilityRadius);

        foreach ($xRange as $indexX) {
            foreach ($yRange as $indexY) {
                $neighbor = $this->checkAndAddNeightbor($indexX, $indexY, $sizeX, $lowerNeighbors, $dropPoint, $heightMap);
                if(!is_null($neighbor)) $lowerNeighbors[] = $neighbor;
            }
        }

        if (count($lowerNeighbors) == 0) {
            $heightMap[$dropPoint] += 1;
        } else {
            $selected = array_rand(array_flip($lowerNeighbors), 1);

            $heightMap[$selected] += 1;
        }
    }

    /**
     * @param int   $x
     * @param int   $y
     * @param int   $sizeX
     * @param array $lowerNeighbor
     * @param int   $dropPoint
     * @param array $heightMap
     *
     * @return int
     */
    private function checkAndAddNeightbor($x, $y, $sizeX, array $lowerNeighbor, $dropPoint, array $heightMap)
    {
        $lowerNeighbor = null;

        if (isset($heightMap[$x + $y * $sizeX])) {
            if ($heightMap[$x + $y * $sizeX] < $heightMap[$dropPoint]) {
                $lowerNeighbor = $x + $y * $sizeX;
            }
        }

        return $lowerNeighbor;
    }
}
