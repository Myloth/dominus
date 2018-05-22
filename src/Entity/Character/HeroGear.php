<?php

namespace App\Entity\Character;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class HeroGear
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="character__hero_gear",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="hero_gear_unq", columns={"bodypart_id", "hero_id"})
 *     }
 * )
 */
class HeroGear
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Character\Hero")
     * @ORM\JoinColumn(name="hero_id", referencedColumnName="id")
     */
    protected $hero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Gear\Gear")
     * @ORM\JoinColumn(name="gear_id", referencedColumnName="id")
     */
    protected $gear;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Statistics\BodyPart")
     * @ORM\JoinColumn(name="bodypart_id", referencedColumnName="id")
     */
    protected $bodyPart;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return HeroGear
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHero()
    {
        return $this->hero;
    }

    /**
     * @param mixed $hero
     *
     * @return HeroGear
     */
    public function setHero($hero)
    {
        $this->hero = $hero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGear()
    {
        return $this->gear;
    }

    /**
     * @param mixed $gear
     *
     * @return HeroGear
     */
    public function setGear($gear)
    {
        $this->gear = $gear;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBodyPart()
    {
        return $this->bodyPart;
    }

    /**
     * @param mixed $bodyPart
     *
     * @return HeroGear
     */
    public function setBodyPart($bodyPart)
    {
        $this->bodyPart = $bodyPart;

        return $this;
    }


}
