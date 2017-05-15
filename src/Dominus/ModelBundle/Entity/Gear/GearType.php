<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 5/19/17
 * Time: 3:50 PM
 */

namespace Dominus\ModelBundle\Entity\Gear;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class GearType
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="gear__gear_type",
 *     indexes={
 *          @ORM\Index(name="idx_gear_type_code", columns={"type", "code"})
 *     }
 * )
 */
class GearType
{

    const CODE_WEAPON_TYPE = "WEAPON";
    const CODE_ARMOR_TYPE = "ARMOR";

    const CODE_ARMOR_LIGHT = "LIGHT";
    const CODE_ARMOR_MEDIUM = "MEDIUM";
    const CODE_ARMOR_HEAVY = "HEAVY";

    const CODE_WEAPON_MELEE_RIGHT_HAND = "MELEE_RIGHT_HAND";
    const CODE_WEAPON_MELEE_LEFT_HAND  = "MELEE_LEFT_HAND";
    const CODE_WEAPON_MELEE_TWO_HANDS  = "MELEE_TWO_HANDS";

    const CODE_WEAPON_DISTANT_RIGHT_HAND = "DISTANT_RIGHT_HAND";
    const CODE_WEAPON_DISTANT_LEFT_HAND  = "DISTANT_LEFT_HAND";
    const CODE_WEAPON_DISTANT_TWO_HANDS  = "DISTANT_TWO_HANDS";

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
    protected $type;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20)
     */
    protected $code;

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
     * @return GearType
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
     * @return GearType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return GearType
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * @return GearType
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}
