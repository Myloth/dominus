<?php

namespace Dominus\ApiBundle\Service\Utils\SimplexNoise;

/**
 * Class SimplexNoiseLazyService
 * @package Dominus\ApiBundle\Service\Utils
 *
 * See script : http://www.java-gaming.org/index.php?topic=29738.0
 */
class SimplexNoiseLazyService
{
    /** @var  array<SimplexNoàiseLazyLayer> */
    protected $layers;

    /** @var array<int> */
    protected $strengths;

    /** @var int */
    protected $strengthsSum;

    /** @var array<int> */
    protected $offsets;

    /**
     * @param int $seed
     * @param int $octaves
     * @param int $smoothness
     */
    public function __construct($seed, $octaves, $smoothness) {
        $this->build($seed,
            $this->generateLayers($smoothness, $octaves, $seed),
            $this->generateStrengths($octaves));
    }

    /**
     * @param int $seed
     * @param array<SimplexNoiseLazyLayer> $layers
     * @param array<int> $strengths
     */
    private function build($seed, $layers, $strengths)
    {
        var_dump(count($this->layers));
        var_dump(count($strengths));
        if(count($layers) != count($strengths)) {
            throw new \Exception('count($layers) != count($strengths)');
        }

        $this->layers = $layers;
        $this->strengths = $strengths;

        $this->strengthsSum = 0;
        foreach($this->strengths as $strength) $this->strengthsSum += $strength;

        $offsets = [];
        $offsetCount = count($this->layers) *2;

        for($i = 0; $i < $offsetCount ; $i++)
        {
            $offsets[$i] = rand(1,128);
        }
    }

    /**
     * @param int $smoothness
     * @param int $octaves
     * @param int $seed
     */
    private function generateLayers($smoothness, $octaves, $seed)
    {
        $potSmoothness = 1;
        while($potSmoothness < $smoothness) {
            $potSmoothness *=2;
        }

        $density = $potSmoothness;
        $layers = [];
        for($i = 0; $i < $octaves; $i++) {
            $this->layers[$i] = new SimplexNoiseLazyLayer($seed, $density);
            $density *= 2;
        }

        return $this->layers;
    }

    /**
     * @param int $octaves
     */
    private function generateStrengths($octaves)
    {
        $strength = 1;
        $this->strengths = [];

        for($i = 0; $i < $octaves; $i++) {
            $this->strengths[$i] = $strength;
            $strength *= 2;
        }

        return $this->strengths;
    }

    /**
     * @param float $x
     * @param float $y
     */
    public function get($x, $y) {
        $val = 0;
        for($i = 0; $i < count($this->layers); $i++) {
            $val += $this->layers[$i]->get($x + $this->offsets[$i*2], $y + $this->offsets[$i*2+1]) *$this->strengths[$i];
        }

        return $val / $this->strengthsSum;
    }
}