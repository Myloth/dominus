<?php

namespace App\Service\Utils\RainMap;

/**
 * Class GaussianFilter
 * @package App\Service\Utils\RainMap
 */
class GaussianFilter
{
    /** @var array  */
    protected $filterKernel = [
        [-3, 0.006],[-2, 0.061],[-1,0.242],
        [0, 0.383],
        [1, 0.242], [2, 0.061], [3, 0.006]
    ];

    /** @var int */
    protected $size;

    /**
     * @param $z
     * @param $sizeZ
     * @param $offset
     * @return bool
     */
    private function isInArray($z, $sizeZ, $offset)
    {
        if($z+$offset >= $sizeZ) return true;
        if($z+$offset < 0) return true;

        return false;
    }

    /**
     * @param array $map
     */
    public function filter(array $map)
    {

        $this->size = bcsqrt(count($map));
        $intermediateArray = $filteredArray = [];

        foreach(range(0, $this->size) as $x) {
            foreach(range(0, $this->size) as $y) {
                $index = $x+$y*$this->size;
                $intermediateArray[$index] = $this->computeXFilteredValue($map, $x, $y);
            }
        }

        foreach(range(0, $this->size) as $x) {
            foreach(range(0, $this->size) as $y) {
                $index = $x+$y*$this->size;
                $filteredArray[$index] = $this->computeYFilteredValue($intermediateArray, $x, $y);
            }
        }

        return $filteredArray;
    }

    private function computeXFilteredValue($array, $x, $y)
    {
        $computedValue = 0;
        foreach($this->filterKernel as $filterPair) {
            if($this->isInArray($x, $this->size-1, $filterPair[0])) {
                $offset = 0;
            } else {
                $offset = $filterPair[0];
            }

            $index = $x + $offset + $y * $this->size;
            if($index < count($array))
                $computedValue += $filterPair[1] * $array[$index];
        }

        return round($computedValue);
    }

    private function computeYFilteredValue($array, $x, $y)
    {
        $computedValue = 0;

        foreach($this->filterKernel as $filterPair) {
            if($this->isInArray($y, $this->size-1, $filterPair[0])) {
                $offset = 0;
            } else {
                $offset = $filterPair[0];
            }

            $index = $x + ($offset + $y) * $this->size;
            if($index < count($array))
                $computedValue += $filterPair[1] * $array[$index];
        }

        return round($computedValue);


    }
}