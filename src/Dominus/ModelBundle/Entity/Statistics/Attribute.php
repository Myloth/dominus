<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 5/18/17
 * Time: 1:55 PM
 */

namespace Dominus\ModelBundle\Entity\Statistics;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Attribute
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="statistics__attribute",
 *     indexes={
 *          @ORM\Index(name="idx_attribute_code", columns={"code"})
 *     }
 * )
 */
class Attribute
{

    const CODE_STRENGTH     = "STRENGTH";
    const CODE_INTEL        = "INTEL";
    const CODE_DEF          = "DEF";
    const CODE_MAGIC_ATTACK = "MAGIC_ATTACK";
    const CODE_MAGIC_DEF    = "MAGIC_DEF";
    const CODE_SPEED        = "SPEED";

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
     * @ORM\Column(type="string", length=30)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30)
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
     * @return Attribute
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
     * @return Attribute
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
     * @return Attribute
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }


}