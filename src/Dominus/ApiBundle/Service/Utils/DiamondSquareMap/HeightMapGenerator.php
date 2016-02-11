<?php

namespace Dominus\ApiBundle\Service\Utils\DiamondSquareMap;

/**
 * Class HeightMapGenerator
 * @package Dominus\ApiBundle\Service\Utils\DiamondSquareMap
 *
 * See script : https://github.com/baxter/csterrain/tree/master/src
 */
class HeightMapGenerator
{
    /** @var  integer */
    protected $size;
    /** @var  integer */
    protected $lowValue;
    /** @var  integer */
    protected $highValue;
    /** @var  array */
    protected $heightMap;
    /** @var integer */
    protected $midValue;
    /** @var integer */
    protected $centerCell;
    /** @var  array */
    protected $queue;

    /**
     * @param integer $size
     */
    public function __construct($size)
    {
        $this->size = $size;
        $this->lowValue = 0;
        $this->highValue = (pow(2,$this->size)) -1;

        $this->midValue = round(pow(2,$this->size) / 2);
        $this->centerCell = round($size/2);

        // init empty map
        $this->heightMap = [];
        for($i = 0; $i < $this->size; $i++) {
            for($j = 0; $j < $this->size; $j++) {
                $this->heightMap[$i][$j] = 0;
            }
        }

        // Set all corners
        $this->setCell(0, 0, $this->midValue); // NW
        $this->setCell(0, $size-1, $this->midValue); // NE
        $this->setCell($size-1, 0, $this->midValue); // SW
        $this->setCell($size-1, $size-1, $this->midValue); // SE

    }

    /**
     * @param integer $x
     * @param integer $y
     */
    private function getCell($x, $y)
    {
        return $this->heightMap[$x][$y];
    }

    /**
     * @param integer $x
     * @param integer $y
     * @param integer $value
     */
    private function setCell($x, $y, $value)
    {
        $this->heightMap[$x][$y] = $value;
    }

    private function softSetCell($x, $y, $value)
    {
        $cellValue = $this->heightMap[$x][$y];
        $this->heightMap[$x][$y] = $cellValue == 0 ? $value : $this->heightMap[$x][$y];
    }

    public function generateMap()
    {
        $this->queue[] = [ 0, 0, $this->size-1, $this->size-1, $this->midValue];

        while($line = array_shift($this->queue)) {
            $this->diamondSquare($line[0], $line[1], $line[2], $line[3], $line[4]);
        }

        return $this->heightMap;
    }

    public function diamondSquare($left, $top, $right, $bottom, $baseHeight)
    {
        $XCenter = floor(($left+$right)/2);
        $YCenter = floor(($top+$bottom)/2);

        $centerPointValue = floor(
            (   $this->getCell($left, $top) +
                $this->getCell($right, $top) +
                $this->getCell($left, $bottom) +
                $this->getCell($right, $bottom) ) / 4 ) - floor((rand(0, 100)/100 - 0.5) * $baseHeight * 2);

        $this->softSetCell($XCenter, $YCenter, $centerPointValue);

        $this->softSetCell($XCenter, $top,
            floor(($this->getCell($left, $top) + $this->getCell($right, $top)) /2 + ((rand(0, 100)/100 - 0.5) * $baseHeight)));
        $this->softSetCell($XCenter, $bottom,
            floor(($this->getCell($left, $bottom) + $this->getCell($right, $bottom)) /2 + ((rand(0, 100)/100 - 0.5) * $baseHeight)));
        $this->softSetCell($left, $YCenter,
            floor(($this->getCell($left, $top) + $this->getCell($left, $bottom)) /2 + ((rand(0, 100)/100 - 0.5) * $baseHeight)));
        $this->softSetCell($right, $YCenter,
            floor(($this->getCell($right, $top) + $this->getCell($right, $bottom)) /2 + ((rand(0, 100)/100 - 0.5) * $baseHeight)));


        if(($right - $left) > 2) {
            $baseHeight = floor($baseHeight * (pow(2, -0.75)));

            $this->queue[] = [$left, $top, $XCenter, $YCenter, $baseHeight];
            $this->queue[] = [$XCenter, $top, $right, $YCenter, $baseHeight];
            $this->queue[] = [$left, $YCenter, $XCenter, $bottom, $baseHeight];
            $this->queue[] = [$XCenter, $YCenter, $right, $bottom, $baseHeight];
        }
    }
}