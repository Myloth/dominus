<?php

namespace Dominus\ModelBundle\Entity\Environment;

use Dominus\ModelBundle\Model\Environment\MapTile as BaseMapTile;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class MapTile.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__map_tile")
 */
class MapTile extends BaseMapTile
{
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Map
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * @param Map $map
     */
    public function setMap(Map $map)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * @return Tile
     */
    public function getTile()
    {
        return $this->tile;
    }

    /**
     * @param Tile $tile
     */
    public function setTile(Tile $tile)
    {
        $this->tile = $tile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpriteClass()
    {
        return $this->spriteClass;
    }

    /**
     * @param mixed $spriteClass
     */
    public function setSpriteClass($spriteClass)
    {
        $this->spriteClass = $spriteClass;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFogged()
    {
        return $this->fogged;
    }

    /**
     * @param boolen $fogged
     */
    public function setFogged($fogged)
    {
        $this->fogged = $fogged;

        return $this;
    }

    /**
     * @return Building
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * @param Building $building
     */
    public function setBuilding(Building $building)
    {
        $this->building = $building;

        return $this;
    }
}
