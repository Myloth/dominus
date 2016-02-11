<?php

namespace Dominus\ApiBundle\Service\Utils\RainMap;

/**
 * Class HeightMapGenerator
 * @package Dominus\ApiBundle\Service\Utils\RainMap
 *
 * see script : https://github.com/gilles-leblanc/gameproject
 * see script : https://gillesleblanc.wordpress.com/2012/10/16/creating-a-random-2d-game-world-map/
 */
class HeightMapGenerator
{
    /** @var int  */
    protected $dropPoints = 13;
    /** @var int  */
    protected $minParticles = 300;
    /** @var int  */
    protected $maxParticles = 550;
    /** @var int  */
    protected $passes = 3;
    /** @var int  */
    protected $particleStabilityRadius = 1;
    /** @var  int */
    protected $width;
    /** @var  int */
    protected $height;

    /** @var  array */
    protected $data;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;

        $this->data = [];
        for($i = 0; $i < $width * $height; $i++) {
            $this->data[] = 0;
        }
    }



    public function generate()
    {
        $width = $this->width;
        $height = $this->height;

        $firstIteration = true;

        for($i = 0; $i < $this->passes; $i++)
        {
            $drops = $this->createDrops();
            $dropX = $width/2;
            $dropY = $height/2;

            foreach($drops as $drop)
            {
                $drop->drop($this->data, $dropX, $dropY, $width);


                if($firstIteration) {
                    $dropX = rand(2, $width-4);
                    $dropY = rand(2, $height-4);
                } else {
                    $dropX = rand(round($width /4), round($width/2 + $width/4)) ;
                    $dropY = rand(round($height/4), round($height/2 + $height/4)) ;
                }
            }

            $firstIteration = false;

            $this->dropPoints = round($this->dropPoints /2);
            $this->minParticles = round($this->minParticles * 1.1);
            $this->maxParticles = round($this->maxParticles * 1.1);


        }

        return $this->data;
    }

    private function createDrops()
    {
        $drops = [];

        for($i = 0; $i < $this->dropPoints; $i++)
        {
            $particleNumber = rand($this->minParticles, $this->maxParticles);
            $range = range(0, ceil($particleNumber));
            foreach($range as $particle)
                $drops[] = new Particles($this->particleStabilityRadius);
        }

        return $drops;
    }

}