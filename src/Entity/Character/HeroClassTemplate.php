<?php

namespace App\Entity\Character;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class HeroClassTemplate
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="character__hero_class_template",
 *     uniqueConstraints={
 *            @ORM\UniqueConstraint(name="unq_level_template", columns={"hero_class_id", "hero_role_id"})
 *     }
 * )
 */
class HeroClassTemplate
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
     * @var HeroClass
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Character\HeroClass")
     * @ORM\JoinColumn(name="hero_class_id", referencedColumnName="id")
     */
    protected $heroClass;

    /**
     * @var HeroRole
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Character\HeroRole")
     * @ORM\JoinColumn(name="hero_role_id", referencedColumnName="id")
     */
    protected $heroRole;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *     targetEntity="App\Entity\Character\HeroClassTemplateAttributeValue",
     *     mappedBy="heroClassTemplate",
     *     cascade={"persist", "remove"}
     * )
     */
    protected $attributeSet;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->attributeSet = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return HeroClassTemplate
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return HeroClass
     */
    public function getHeroClass()
    {
        return $this->heroClass;
    }

    /**
     * @param HeroClass $heroClass
     * @return HeroClassTemplate
     */
    public function setHeroClass($heroClass)
    {
        $this->heroClass = $heroClass;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAttributeSet()
    {
        return $this->attributeSet;
    }

    /**
     * @param ArrayCollection $attributeSet
     * @return HeroClassTemplate
     */
    public function setAttributeSet( ArrayCollection $attributeSet)
    {
        $this->attributeSet = $attributeSet;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeroRole()
    {
        return $this->heroRole;
    }

    /**
     * @param mixed $heroRole
     * @return HeroClassTemplate
     */
    public function setHeroRole($heroRole)
    {
        $this->heroRole = $heroRole;

        return $this;
    }
    /**
     * @param HeroClassTemplateAttributeValue
     *
     * @return HeroClassTemplate
     */
    public function addAttribute(HeroClassTemplateAttributeValue $attribute)
    {
        foreach ($this->attributeSet as $attributeValue) {
            if ($attributeValue->getAttribute()->getId() === $attribute->getAttribute()->getId()) {
                $this->attributeSet->removeElement($attributeValue);
            }
        }

        $this->attributeSet->add($attribute);

        return $this;
    }
}
