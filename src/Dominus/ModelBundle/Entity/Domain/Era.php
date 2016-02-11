<?php

namespace Dominus\ModelBundle\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Model\Domain\Era as BaseEra;

/**
 * Class Era.
 *
 * @ORM\Entity
 * @ORM\Table(name="domain__era")
 */
class Era extends BaseEra
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
}
