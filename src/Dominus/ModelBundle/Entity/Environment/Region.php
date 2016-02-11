<?php

namespace Dominus\ModelBundle\Entity\Environment;

use Dominus\ModelBundle\Model\Environment\Region as BaseRegion;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Region.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__region")
 */
class Region extends BaseRegion
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
     *
     * @return Region
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return World
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * @param World $world
     *
     * @return Region
     */
    public function setWorld(World $world)
    {
        $this->world = $world;

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
     *
     * @return Region
     */
    public function setMap(Map $map)
    {
        $this->map = $map;

        return $this;
    }
}
