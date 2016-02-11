<?php

namespace Dominus\ModelBundle\Entity\Environment;

use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Model\Environment\Resource as BaseResource;

/**
 * Class Resource.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__resource")
 */
class Resource extends BaseResource
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
}
