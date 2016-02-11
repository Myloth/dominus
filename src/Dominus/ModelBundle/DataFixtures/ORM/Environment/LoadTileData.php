<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Environment;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Environment\Tile;

class LoadTileData extends AbstractFixture
{

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            "tile-ocean" => [ $this->getReference("tiletype-water"), "ocean", false, true, true, false, false, 0],
            "tile-coast" => [ $this->getReference("tiletype-land"), "coast", true, false, true, true, false, 1],
            "tile-plain" => [ $this->getReference("tiletype-land"), "plain", true, false, true, true, true, 2],
            "tile-forest" => [ $this->getReference("tiletype-land"), "forest", true, false, true, true, true, 2],
            "tile-mountain" => [ $this->getReference("tiletype-land"), "mountain", false, false, true, false, false, 3],
            ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $tile = new Tile();
        $tile->setTileType($data[0])
            ->setName($data[1])
            ->setLandMoveAllowed($data[2])
            ->setWaterMoveAllowed($data[3])
            ->setAirMoveAllowed($data[4])
            ->setBuildable($data[5])
            ->setResourceAllowed($data[6])
            ->setReliefCode($data[7]);

        return $tile;

    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 11;
    }
}