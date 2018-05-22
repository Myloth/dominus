<?php

namespace App\Entity\Crafting;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class Resource
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="crafting__material",
 *     indexes={
 *          @ORM\Index(name="idx_material_code", columns={"code"})
 *      }
 * )
 */
class Material
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
     * @var MaterialType
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Crafting\MaterialType")
     * @ORM\JoinColumn(name="material_type_id", referencedColumnName="id")
     */
    protected $materialType;

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
     * @return Material
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
     * @return Material
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
     * @return Material
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return MaterialType
     */
    public function getMaterialType()
    {
        return $this->materialType;
    }

    /**
     * @param MaterialType $materialType
     *
     * @return Material
     */
    public function setMaterialType($materialType)
    {
        $this->materialType = $materialType;

        return $this;
    }
}