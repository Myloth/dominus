<?php

namespace Dominus\ModelBundle\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Model\Domain\Ruler as BaseRuler;

/**
 * Class Ruler.
 *
 * @ORM\Entity
 * @ORM\Table(name="domain__ruler")
 */
class Ruler extends BaseRuler
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

    /**
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param string $background
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }
}
