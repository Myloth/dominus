<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 5/18/17
 * Time: 1:48 PM
 */

namespace Dominus\ModelBundle\Entity\Character;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Entity\Gear\GearType;
use Dominus\ModelBundle\Entity\Statistics\Attribute;

/**
 * Class HeroClass
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="character__hero_class",
 *     indexes={
 *          @ORM\Index(name="idx_armor_type", columns={"armor_type_id"})
 *     }
 * )
 */
class HeroClass
{
    const CODE_WARRIOR = "WARRIOR"; // Physical Offense
    const CODE_BATTLEMAGE = "BATTLEMAGE"; // Magical offense
    const CODE_PALADIN = "PALADIN"; // Support
    const CODE_GUARDIAN = "GUARDIAN"; // defense

    const CODE_PRIEST  = "PRIEST"; // Support
    const CODE_MAGE    = "MAGE"; // Magical Offense
    const CODE_BLADE_DANCER = "BLADE_DANCER"; // Physical offense
    const CODE_SHIELD_BEARER = "SHIELD_BEARER"; // Defense

    const CODE_RANGER  = "RANGER"; // Physical offense
    const CODE_SHAMAN = "SHAMAN"; // Magical offense
    const CODE_ROGUE = "ROGUE"; // Defense

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
     * @ORM\Column(type="string", length=50)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $code;

    /**
     * @var GearType
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Gear\GearType")
     * @ORM\JoinColumn(name="armor_type_id", referencedColumnName="id")
     */
    protected $armorType;

    /**
     * @var Attribute
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Statistics\Attribute")
     * @ORM\JoinColumn(name="main_attribute_id", referencedColumnName="id")
     */
    protected $mainAttribute;

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
     * @return HeroClass
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
     * @return HeroClass
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return HeroClass
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return GearType
     */
    public function getArmorType()
    {
        return $this->armorType;
    }

    /**
     * @param GearType $armorType
     *
     * @return HeroClass
     */
    public function setArmorType($armorType)
    {
        $this->armorType = $armorType;

        return $this;
    }

    /**
     * @return Attribute
     */
    public function getMainAttribute()
    {
        return $this->mainAttribute;
    }

    /**
     * @param Attribute $mainAttribute
     *
     * @return HeroClass
     */
    public function setMainAttribute($mainAttribute)
    {
        $this->mainAttribute = $mainAttribute;

        return $this;
    }
}