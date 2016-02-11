<?php

namespace Dominus\ModelBundle\Entity\Environment;

use Dominus\ModelBundle\Model\Environment\Map as BaseMap;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Map.
 *
 * @ORM\Entity
 * @ORM\Table(name="domain__map")
 */
class Map extends BaseMap
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
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param Region $region
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;

        return $this;
    }
}
