<?php

namespace Dominus\ModelBundle\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Room
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="domain__room"
 * )
 */
class Room
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $maxLevel;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $maxBuilding = 1;

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
     * @return Room
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
     *
     * @return Room
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Room
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLevel()
    {
        return $this->maxLevel;
    }

    /**
     * @param int $maxLevel
     *
     * @return Room
     */
    public function setMaxLevel($maxLevel)
    {
        $this->maxLevel = $maxLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxBuilding()
    {
        return $this->maxBuilding;
    }

    /**
     * @param int $maxBuilding
     *
     * @return Room
     */
    public function setMaxBuilding($maxBuilding)
    {
        $this->maxBuilding = $maxBuilding;

        return $this;
    }


}