<?php

namespace Dominus\ApiBundle\Service;


class CellularAutomataService
{

   const LAND_CELLS_LIMIT = 5;

    /**
     * @param array $array a 2 dimensional array
     *
     * @return array
     */
    public function iterate(array &$array)
    {

        foreach($array as $yIndex => &$line) {
            foreach($line as $xIndex => &$tile) {

                $cells = $this->getNeighborCells($xIndex, $yIndex, $array);

                $result = array_count_values($cells);
                if(!empty($result)) {

                    if (isset($result["#"]) && $result["#"] >= self::LAND_CELLS_LIMIT) {
                        $tile = "#";
                    } else {

                        $tile = ".";
                    }
                }
            }
        }

        return $array;
    }

    /**
     * @param integer $xIndex
     * @param integer $yIndex
     * @param array   $map
     */
    protected function getNeighborCells($xIndex, $yIndex, array $map)
    {
        $cells = [];

        $startXIndex = $xIndex != 0 ? $xIndex -1 : 0;
        $startYIndex = $yIndex != 0 ? $yIndex -1 : 0;
        $endXIndex = $xIndex != count($map[$yIndex])-1
            ? $xIndex +1 : $xIndex;
        $endYIndex = $yIndex != count($map)-1 ? $yIndex+1 : $yIndex;

        for($j = $startYIndex; $j <= $endYIndex ; $j++)
        {
            for($i = $startXIndex; $i <= $endXIndex; $i++) {


                $cells[] = $map[$j][$i];
            }
        }

        return $cells;
    }
}