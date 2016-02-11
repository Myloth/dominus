<?php

namespace Dominus\ModelBundle\Entity\Environment;

use Dominus\ModelBundle\Model\Environment\Tile as BaseTile;
use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Entity\Environment\TileType;

/**
 * Class Tile.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__tile")
 */
class Tile extends BaseTile
{
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
     * @return Dominus\ModelBundle\Entity\Environment\TileType
     */
    public function getTileType()
    {
        return $this->tileType;
    }

    /**
     * @param Dominus\ModelBundle\Entity\Environment\TileType $tileType
     */
    public function setTileType(TileType $tileType)
    {
        $this->tileType = $tileType;

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
     * @return bool
     */
    public function isLandMoveAllowed()
    {
        return $this->landMoveAllowed;
    }

    /**
     * @param bool $landMoveAllowed
     */
    public function setLandMoveAllowed($landMoveAllowed)
    {
        $this->landMoveAllowed = $landMoveAllowed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isWaterMoveAllowed()
    {
        return $this->waterMoveAllowed;
    }

    /**
     * @param bool $waterMoveAllowed
     */
    public function setWaterMoveAllowed($waterMoveAllowed)
    {
        $this->waterMoveAllowed = $waterMoveAllowed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAirMoveAllowed()
    {
        return $this->airMoveAllowed;
    }

    /**
     * @param bool $airMoveAllowed
     */
    public function setAirMoveAllowed($airMoveAllowed)
    {
        $this->airMoveAllowed = $airMoveAllowed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isBuildable()
    {
        return $this->buildable;
    }

    /**
     * @param bool $buildable
     */
    public function setBuildable($buildable)
    {
        $this->buildable = $buildable;

        return $this;
    }

    /**
     * @return bool
     */
    public function isResourceAllowed()
    {
        return $this->resourceAllowed;
    }

    /**
     * @param bool $resourceAllowed
     */
    public function setResourceAllowed($resourceAllowed)
    {
        $this->resourceAllowed = $resourceAllowed;

        return $this;
    }

    /**
     * @return int
     */
    public function getReliefCode()
    {
        return $this->reliefCode;
    }

    /**
     * @param int $reliefCode
     */
    public function setReliefCode($reliefCode)
    {
        $this->reliefCode = $reliefCode;
        return $this;
    }
}
