<?php

namespace App\Service\Utils\RainMap;

class Map
{
    /** @var int */
    protected $width;
    /** @var  int */
    protected $height;
    /** @var  array */
    protected $heightMap;


    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function generate()
    {
        $generator = new HeightMapGenerator($this->width, $this->height);
        $this->heightMap = $generator->generate();

        $blurFilter = new GaussianFilter();
        $this->heightMap = $blurFilter->filter($this->heightMap);

        return $this->renderAs2dArray($this->heightMap);

    }

    protected function renderAs2dArray($flatMap)
    {
        $map = [];

        foreach($flatMap as $key => $value)
        {
            $x = $key % $this->width;
            $y = floor($key/$this->width);

            $map[$y][$x] = $value;
        }

        return $map;
    }
}