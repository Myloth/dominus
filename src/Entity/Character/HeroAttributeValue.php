<?php

namespace App\Entity\Character;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Statistics\Attribute;

/**
 * Class AttributeValue
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="character__hero_attribute_value",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="hero_attibute_unq", columns={"attribute_id", "hero_id"})
 *     }
 * )
 */
class HeroAttributeValue
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
     * @var Attribute
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Statistics\Attribute")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id")
     */
    protected $attribute;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Character\Hero")
     * @ôRM\JoinColumn(name="hero_id", referencedColumnName="id")
     */
    protected $hero;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $value;

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
     * @return HeroAttributeValue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Attribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param Attribute $attribute
     *
     * @return HeroAttributeValue
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

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
     * @return HeroAttributeValue
     */
    public function setHero($hero)
    {
        $this->hero = $hero;

        return $this;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return HeroAttributeValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}