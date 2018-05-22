<?php

namespace App\Entity\Environment;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class World.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__world")
 */
class World
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
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Environment\Region", mappedBy="world")
     */
    protected $regions;

    public function __construct()
    {
        $this->regions = new ArrayCollection();
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
     * @return ArrayCollection
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * @param ArrayCollection $regions
     */
    public function setRegions(ArrayCollection $regions)
    {
        $this->regions = $regions;

        return $this;
    }

    /**
     * @param Region $region
     *
     * @return $this
     */
    public function addRegion(Region $region)
    {
        $this->regions->add($region);

        return $this;
    }

    /**
     * @param Region $region
     *
     * @return $this
     */
    public function removeRegion(Region $region)
    {
        $this->regions->removeElement($region);

        return $this;
    }
}
