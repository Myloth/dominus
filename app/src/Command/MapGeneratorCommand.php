<?php

namespace App\Command;


use App\Service\Utils\MapGeneratorService;
use App\Service\Utils\PerlinNoiseService;
use App\Service\Utils\DiamondSquareMap\HeightMapGenerator;
use App\Service\Utils\RainMap\Map;
use App\Service\Utils\SimplexNoise\SimplexNoiseLazyService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MapGeneratorCommand extends Command
{

    protected $mapManager;

    protected function configure()
    {
        $this->setName("dominus:map:generate")
            ->addOption("land-ratio", null, InputOption::VALUE_REQUIRED, "The ratio for land present in the map")
            ->addOption("width", null, InputOption::VALUE_OPTIONAL, "number of tiles for the width of the map", 30)
            ->addOption("height", null, InputOption::VALUE_OPTIONAL, "number of tiles for the width of the map", 30)
            ->addOption("mode", null, InputOption::VALUE_OPTIONAL, "Generation mode", "cellular");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $landRatio = $input->getOption('land-ratio');
        $width = $input->getOption('width');
        $height = $input->getOption('height');
        $mode = $input->getOption('mode');

        if( $mode == "cellular")
        {

            $manager = new MapManager(new MapGeneratorService());

            $map = $manager->generateMap($landRatio, $width, $height, 2);

            foreach($map as $line)
            {
                foreach($line as $tile) {
                    if($tile == '.') {
                        echo "\033[0;34m".$tile."\033[0m";
                    }
                    elseif($tile == 2) {
                        echo "\033[0;32m".$tile."\033[0m";
                    }
                    elseif($tile == 3) {
                        echo "\033[0;31m".$tile."\033[0m";
                    }
                    else {
                        echo $tile;
                    }

                }
                echo "\n";
            }
        } elseif( $mode == "perlin") {
            $service = new PerlinNoiseService();

            $seed = $service->generateWhiteNoise($width, $height);
            $noise = $service->generateSmoothNoise($seed, 6);
            $noise = $service->generatePerlinNoise($noise, 8);

            /// Get min and max values from the array;
            $top = $bottom = 0;
            foreach($noise as $line)
            {
                foreach($line as $tile) {
                    if($tile > $top) $top = $tile;
                    if($tile < $bottom) $bottom = $tile;
                }
                echo "\n";
            }

            $range = $top - $bottom;
            $percent = floor($range/10);

            $waterMaxValue = $bottom + 2*$percent;
            $coastMaxValue = $waterMaxValue + $percent;
            $landMaxValue = $coastMaxValue + 5*$percent;



            foreach($noise as $line)
            {
                foreach($line as $tile) {

                    if($tile < $waterMaxValue) $tile = 0;
                    elseif($tile < $coastMaxValue) $tile = 1;
                    elseif($tile < $landMaxValue) $tile = 2;
                    else $tile = 3;


                    if($tile == '.') {
                        echo "\033[0;34m".$tile."\033[0m";
                    }
                    elseif($tile == 2) {
                        echo "\033[0;32m".$tile."\033[0m";
                    }
                    elseif($tile == 3) {
                        echo "\033[0;31m".$tile."\033[0m";
                    }
                    else {
                        echo $tile;
                    }

                }
                echo "\n";
            }
        } elseif($mode == "simplex") {

            $seed = rand();

            $seed ^= $seed << 21;
            $seed ^= ($seed >> 35);
            $seed ^= ($seed << 4);

            $noise = new SimplexNoiseLazyService($seed, 2, 3);

            $xoffset = rand() % 10000000;
            $yoffset = rand() % 10000000;

            $map = array();

            for($y = 0 ; $y < $height; $y++) {
                for($x = 0; $x != $width; $x++) {
                    $val = ($noise->get($x + $xoffset, $y + $yoffset) +1 ) /2;

                    $map[$y][$x] = $val;
                }
                echo "\n";
            }

            $top = $bottom = 0;
            foreach($map as $line)
            {
                foreach($line as $tile) {
                    if($tile > $top) $top = $tile;
                    if($tile < $bottom) $bottom = $tile;
                }
                echo "\n";
            }

            $range = $top - $bottom;
            $percent = $range/10;

            $waterMaxValue = $bottom + 6*$percent;
            $coastMaxValue = $waterMaxValue + $percent/2;
            $landMaxValue = $coastMaxValue + 2*$percent;


            foreach($map as $line)
            {
                foreach($line as $tile) {

                    if($tile < $waterMaxValue) $tile = 0;
                    elseif($tile < $coastMaxValue) $tile = 1;
                    elseif($tile < $landMaxValue) $tile = 2;
                    else $tile = 3;


                    if($tile == '.') {
                        echo "\033[0;34m".$tile."\033[0m";
                    }
                    elseif($tile == 2) {
                        echo "\033[0;32m".$tile."\033[0m";
                    }
                    elseif($tile == 3) {
                        echo "\033[0;31m".$tile."\033[0m";
                    }
                    else {
                        echo $tile;
                    }

                }
                echo "\n";
            }
        } elseif( $mode == "rain") {

            $map = new Map($width, $height);

            $data = $map->generate();

            foreach($data as $y => $line)
            {
                foreach($line as $x => $tile) {

//                    if($x == 0 || $y == 0 || $tile == 0) {
//                        $tile =  "\033[0;34m.\033[0m";
//                    } elseif($tile > 60) {
//                        $tile = "\033[0;37m^\033[0m";
//                    } elseif($tile >= 1 && $tile <= 2) {
//                        $tile =  "\033[0;33m.\033[0m";
//                    } elseif($tile >= 30 && $tile <= 60) {
//                        $tile =  "\033[0;32m#\033[0m";
//                    } else {
//                        $tile =  "\033[0;32m.\033[0m";
//                    }
                    
                        echo $tile. " ";

                }
                echo "\n";
            }
        } elseif( $mode == "diamond") {
            $map = new HeightMapGenerator($width);

            $data = $map->generateMap();


            $top = $bottom = 0;
            foreach($data as $line)
            {
                foreach($line as $tile) {
                    if($tile > $top) $top = $tile;
                    if($tile < $bottom) $bottom = $tile;
                }
                echo "\n";
            }

            $range = $top - $bottom;
            $percent = $range/10;

            $oceanMaxValue = $bottom + 3*$percent;
            $waterMaxValue = $oceanMaxValue + 2*$percent;
            $coastMaxValue = $waterMaxValue + $percent/2;
            $landMaxValue = $coastMaxValue + 2*$percent;
            $hillsMaxValue = $landMaxValue + $percent;

            foreach($data as $y => $line)
            {
                foreach($line as $x => $tile) {


                    if($tile < $oceanMaxValue) $tile = "\033[0;34m~\033[0m";
                    elseif($tile < $waterMaxValue) $tile = "\033[1;34m~\033[0m";
                    elseif($tile < $coastMaxValue) $tile = "\033[1;33m.\033[0m";
                    elseif($tile < $landMaxValue) $tile = "\033[0;32m#\033[0m";
                    elseif($tile < $hillsMaxValue) $tile = "\033[0;31m#\033[0m";
                    else $tile = "\033[0;30m^\033[0m";

                    echo $tile;

                }
                echo "\n";
            }
        }

    }
}