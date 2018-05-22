<?php

namespace App\Entity\Crafting;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class MaterialType
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="crafting__material_type"
 * )
 */
class MaterialType
{
    const CODE_METAL = "METAL";
    const CODE_FABRIC = "FABRIC";
    const CODE_VEGETAL = "VEGETAL";
    const CODE_LEATHER = "LEATHER";

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
     * @ORM\Column(type="string", length=40)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
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
     * @return MaterialType
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
     * @return MaterialType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return MaterialType
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }


}

