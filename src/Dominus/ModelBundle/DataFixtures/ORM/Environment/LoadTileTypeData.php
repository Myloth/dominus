<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Environment;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Environment\TileType;

class LoadTileTypeData extends AbstractFixture
{

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            "tiletype-water" => [ 1,"water","water" ],
            "tiletype-land" => [ 2,"land","land" ],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $tileType = new TileType();
        $tileType->setId($data[0])
            ->setName($data[1])
            ->setCode($data[2]);

        return $tileType;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 10;
    }
}