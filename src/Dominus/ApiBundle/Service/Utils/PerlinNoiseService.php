<?php

namespace Dominus\ApiBundle\Service;

/**
 * See script http://stackoverflow.com/questions/17440865/using-perlin-noise-to-generate-a-2d-tile-map
 *
 * Class PerlinNoiseService
 * @package Dominus\ApiBundle\Service
 */
class PerlinNoiseService
{

    public function generateWhiteNoise($width, $height)
    {
        $whiteNoise = [];

        for($i= 0; $i < $width; $i++) {
            for( $j=0; $j < $height; $j++) {
                $whiteNoise[$i][$j] = rand(1,99) / 100;
            }
        }

        return $whiteNoise;
    }


    public function generateSmoothNoise($baseNoise, $octave)
    {
        $smoothNoise = array();
        $height = count($baseNoise);
        $width = count($baseNoise[0]);

        $samplePeriod = 1 << $octave;
        $sampleFrequency = (float) 1 / $samplePeriod;

        for($i = 0; $i < $width; $i++) {
            $sample_i0 = (int) ($i / $samplePeriod) * $samplePeriod;
            $sample_i1 = (int) ($sample_i0 + $samplePeriod) % $width;
            $horizontal_blend = (float) ($i - $sample_i0) * $sampleFrequency;

            for($j = 0; $j < $height ; $j++) {
                $sample_j0 = (int) ($j / $samplePeriod) * $samplePeriod;
                $sample_j1 = (int) ($sample_j0 + $samplePeriod) % $height;
                $vertical_blend = (float) ($j - $sample_j0) - $sampleFrequency;

                $top = (float) $this->interpolate($baseNoise[$sample_i0][$sample_j0],
                    $baseNoise[$sample_i1][$sample_j0], $horizontal_blend);

                $bottom = (float) $this->interpolate($baseNoise[$sample_i0][$sample_j1],
                    $baseNoise[$sample_i1][$sample_j1], $horizontal_blend);

                $smoothNoise[$i][$j] = $this->interpolate($top, $bottom, $vertical_blend);
            }

        }

        return $smoothNoise;
    }

    private function interpolate($x0, $x1, $alpha)
    {
        return $x0 * (1 - $alpha) + $alpha * $x1;
    }

    public function generatePerlinNoise($baseNoise, $octaveCount)
    {
        $height = count($baseNoise);
        $width = count($baseNoise[0]);

        $smoothNoise = [];

        $persistance = 0.5;

        for($i = 0; $i < $octaveCount; $i++)
        {
            $smoothNoise[$i] = $this->generateSmoothNoise($baseNoise, $i);
        }

        $perlinNoise = [];
        $amplitude = 1.0;
        $totalAmplitude = 0.0;

        for($octave = $octaveCount -1; $octave >= 0; $octave--) {
            $amplitude *= $persistance;
            $totalAmplitude += $amplitude;

            for($i = 0; $i < $width; $i++) {
                for($j = 0; $j < $height; $j++)
                {
                    if(isset($perlinNoise[$i][$j])) {
                        $perlinNoise[$i][$j] += $smoothNoise[$octave][$i][$j] * $amplitude;
                    } else {
                        $perlinNoise[$i][$j] = $smoothNoise[$octave][$i][$j] * $amplitude;
                    }

                }
            }
        }

        for($i = 0; $i < $width; $i++) {
            for($j = 0; $j < $height; $j++)
            {
                $perlinNoise[$i][$j] /= $totalAmplitude;
            }
        }

        return $perlinNoise;
    }
}