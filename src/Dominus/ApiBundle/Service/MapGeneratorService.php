<?php

namespace Dominus\ApiBundle\Service;

/**
 * Class MapGeneratorService.
 */
class MapGeneratorService extends CellularAutomataService
{

    const MOUNTAIN_PROBABILITY = 20;
    const MOUNTAIN_CHAIN_PROBABILITY = 30;

    /**
     * @param $ratio
     * @param $width
     * @param $height
     *
     * @return array
     */
    public function populateFirstMap($ratio, $width, $height)
    {
        $map = [];
        for ($i = 0; $i < $height; ++$i) {
            $line = [];
            for ($j = 0; $j < $width; ++$j) {
                $landProbability = rand(0, 100);
                if ($landProbability < $ratio) {
                    $line[$j] = '#';
                } else {
                    $line[$j] = '.';
                }
            }

            $map[] = $line;
        }

        return $map;
    }

    /**
     * @param array $map
     *
     * @return array
     */
    public function applyRelief($map)
    {
        // Set coasts
        $this->setCoasts($map);
        $this->setBaseLand($map);
        $this->setMountains($map);

        return $map;
    }

    /**
     * @param $map
     */
    public function setCoasts(&$map)
    {
        foreach($map as $yIndex => &$line) {
            foreach($line as $xIndex => &$tile)
            {
                $cells = $this->getNeighborCells($xIndex, $yIndex, $map);

                if(in_array('.', $cells) && $tile == "#") {
                    $tile = 1;
                }

            }
        }
    }

    /**
     * @param array $map
     */
    public function setBaseLand(&$map)
    {
        foreach($map as $yIndex => &$line) {
            foreach($line as $xIndex => &$tile)
            {
                if(!in_array($tile, ['.', 1])) {
                        $tile = 2;
                }
            }
        }
    }

    /**
     * @param array map
     */
    public function setMountains(&$map)
    {
        foreach($map as $yIndex => &$line) {
            foreach($line as $xIndex => &$tile)
            {
                if($tile == 2) {
                    $cells = $this->getNeighborCells($xIndex, $yIndex, $map);
                    if(in_array(1, $cells)) continue;

                    $prob = rand(1,100);
                    if(in_array(3, $cells)) {
                        if($prob < self::MOUNTAIN_CHAIN_PROBABILITY) $tile = 3;
                    } else {
                        if($prob < self::MOUNTAIN_PROBABILITY) $tile = 3;
                    }
                }
            }
        }
    }
}
