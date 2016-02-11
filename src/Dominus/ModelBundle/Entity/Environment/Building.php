<?php

namespace Dominus\ModelBundle\Entity\Environment;

use Dominus\ModelBundle\Model\Environment\Building as BaseBuilding;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Building.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__building")
 */
class Building extends BaseBuilding
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
}
