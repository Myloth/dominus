<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 5/30/17
 * Time: 2:01 PM
 */

namespace Dominus\ModelBundle\Entity\Gear;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Armor
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="gear__gear"
 * )
 */
class Gear
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
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var GearType
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Gear\GearType")
     * @ORM\JoinColumn(name="gear_type_id", referencedColumnName="id")
     */
    protected $gearType;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Gear\GearAttributeValue", mappedBy="gear")
     */
    protected $attributeSet;

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
     * @return Gear
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
     * @return Gear
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return GearType
     */
    public function getGearType()
    {
        return $this->gearType;
    }

    /**
     * @param GearType $gearType
     *
     * @return Gear
     */
    public function setGearType($gearType)
    {
        $this->gearType = $gearType;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttributeSet()
    {
        return $this->attributeSet;
    }

    /**
     * @param ArrayCollection $attributeSet
     *
     * @return Gear
     */
    public function setAttributeSet($attributeSet)
    {
        $this->attributeSet = $attributeSet;

        return $this;
    }
}