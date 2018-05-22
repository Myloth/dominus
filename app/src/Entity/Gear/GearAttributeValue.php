<?php

namespace App\Entity\Gear;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Statistics\Attribute;

/**
 * Class ArmorAttributeValue
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="gear__gear_attribute_value"
 * )
 */
class GearAttributeValue
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
     * @var Gear
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Gear\Gear")
     * @ORM\JoinColumn(name="armor_id", referencedColumnName="id")
     */
    protected $gear;

    /**
     * @var Attribute
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Statistics\Attribute")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id")
     */
    protected $attribute;

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
     * @return GearAttributeValue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Gear
     */
    public function getGear()
    {
        return $this->gear;
    }

    /**
     * @param Gear $gear
     *
     * @return GearAttributeValue
     */
    public function setGear($gear)
    {
        $this->gear = $gear;

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
     * @return GearAttributeValue
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

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
     * @return GearAttributeValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }
}
