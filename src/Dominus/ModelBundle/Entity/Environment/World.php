<?php

namespace Dominus\ModelBundle\Entity\Environment;

use Dominus\ModelBundle\Entity\User\User;
use Doctrine\Common\Collections\ArrayCollection;
use Dominus\ModelBundle\Model\Environment\World as BaseWorld;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class World.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__world")
 */
class World extends BaseWorld
{
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
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;

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
