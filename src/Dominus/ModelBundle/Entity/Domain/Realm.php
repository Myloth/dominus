<?php

namespace Dominus\ModelBundle\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Dominus\ModelBundle\Entity\User\User;
use Dominus\ModelBundle\Model\Domain\Realm as BaseRealm;

/**
 * Class Realm.
 *
 * @ORM\Entity()
 * @ORM\Table(name="domain__realm")
 */
class Realm extends BaseRealm
{
    public function __construct()
    {
        $this->resources = new ArrayCollection();
        $this->cities = new ArrayCollection();
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
    public function setUser($user)
    {
        $this->user = $user;

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

    /**
     * @return Ruler
     */
    public function getRuler()
    {
        return $this->ruler;
    }

    /**
     * @param Ruler $ruler
     */
    public function setRuler(Ruler $ruler)
    {
        $this->ruler = $ruler;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param ArrayCollection $resources
     */
    public function setResources($resources)
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrestige()
    {
        return $this->prestige;
    }

    /**
     * @param int $prestige
     */
    public function setPrestige($prestige)
    {
        $this->prestige = $prestige;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param ArrayCollection $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;

        return $this;
    }

    /**
     * @return Era
     */
    public function getEra()
    {
        return $this->era;
    }

    /**
     * @param Era $era
     */
    public function setEra(Era $era)
    {
        $this->era = $era;

        return $this;
    }
}
