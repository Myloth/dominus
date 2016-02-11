<?php

namespace Dominus\ModelBundle\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Model\Domain\City as BaseCity;
use Dominus\ModelBundle\Model\Domain\Realm;

/**
 * Class City.
 *
 * @ORM\Entity
 * @ORM\Table(name="domain__city")
 */
class City extends BaseCity
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
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @param mixed $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCitizens()
    {
        return $this->citizens;
    }

    /**
     * @param mixed $citizens
     */
    public function setCitizens($citizens)
    {
        $this->citizens = $citizens;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * @param mixed $realm
     */
    public function setRealm(Realm $realm)
    {
        $this->realm = $realm;

        return $this;
    }
}
