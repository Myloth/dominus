<?php

namespace App\Service\Utils\SimplexNoise;

/**
 * Class Operators
 * @package App\Service\Utils
 */
class Operators
{

    public static function rightShiftZeroFill($a, $b)
    {
        if($a>=0) return $a>>$b;
        if($b==0) return (($a>>1)&0x7fffffff)*2+(($a>>$b)&1);
        return ((~$a)>>$b)^(0x7fffffff>>($b-1));
    }
}