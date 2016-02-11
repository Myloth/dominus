<?php

namespace Dominus\ApiBundle\Service\Utils\SimplexNoise;

class SimplexNoiseLazyLayer
{
    /** @var integer */
    protected $seed;

    /** @var integer */
    protected $density;

    /**
     * @param float $seed
     * @param int $density
     */
    public function __construct($seed, $density)
    {
        $this->seed = $seed;
        $this->density = $density;
    }

    /**
     * @param float $x
     * @param float $y
     */
    public function get($x, $y)
    {
        $cellX0 = (int) floor($x / $this->density);
        $cellX1 = (int) floor($x / $this->density) + 1;
        $cellY0 = (int) floor($y / $this->density);
        $cellY1 = (int) floor($y / $this->density) + 1;

        $value00 = (float) $this->getRand($cellX0, $cellY0) > 0 ? -1 : 1;
        $value01 = (float) $this->getRand($cellX0, $cellY1) > 0 ? -1 : 1;
        $value10 = (float) $this->getRand($cellX1, $cellY0) > 0 ? -1 : 1;
        $value11 = (float) $this->getRand($cellX1, $cellY1) > 0 ? -1 : 1;

        $relativeX = (float) $x - ($cellX0 * $this->density);
        $relativeY = (float) $y - ($cellY0 * $this->density);
        $timeX = (float) $relativeX / $this->density;
        $timeY = (float) $relativeY / $this->density;

        $intHoriz0 = (float) $this->interpolate($timeX, $value00, 0, $value10, 1);
        $intHoriz1 = (float) $this->interpolate($timeX, $value01, 0, $value11, 1);
        $intVert = (float) $this->interpolate($timeY, $intHoriz0, 0, $intHoriz1, 1);

        return $intVert;

    }

    private static function hashWang($key) {
        $key = (~$key) + ($key << 21); // key = (key << 21) - key - 1;
        $key = $key ^ (Operators::rightShiftZeroFill($key, 24));
        $key = ($key + ($key << 3)) + ($key << 8); // key * 265
        $key = $key ^ (Operators::rightShiftZeroFill($key, 14));
        $key = ($key + ($key << 2)) + ($key << 4); // key * 21
        $key = $key ^ (Operators::rightShiftZeroFill($key, 28));
        $key = $key + ($key << 31);

        return $key;
    }

    private function getRand($x, $y)
    {
        return $this->hashWang(($x << 17) ^ $y) + $this->seed;
    }

    protected function interpolate($t, $y0, $x0, $y1, $x1) {

        $t2 = $t * $t;
        $int = 3 * $t2 - 2 * $t2 * $t;

        return $int * ( $y1 - $y0) + $y0;
    }
}