<?php

namespace Dominus\ModelBundle\Entity\Environment;

use Doctrine\Common\Collections\ArrayCollection;
use Dominus\ModelBundle\Model\Environment\TileType as BaseTileType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class TileType.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__tile_type")
 */
class TileType extends BaseTileType
{
    public function __construct()
    {
        $this->tiles = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getTiles()
    {
        return $this->tiles;
    }

    /**
     * @param ArrayCollection $tiles
     */
    public function setTiles($tiles)
    {
        $this->tiles = $tiles;

        return $this;
    }

    /**
     * @param Tile $tile
     *
     * @return $this
     */
    public function addTile(Tile $tile)
    {
        $this->tiles->add($tile);

        return $this;
    }

    /**
     * @param Tile $tile
     *
     * @return $this
     */
    public function removeTile(Tile $tile)
    {
        $this->tiles->removeElement($tile);

        return $this;
    }
}
