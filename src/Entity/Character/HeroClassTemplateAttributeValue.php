<?php

namespace App\Entity\Character;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Statistics\Attribute;

/**
 * Class HeroClassTemplateAttributeValue
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="character__hero_class_template_attributes",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="unq_attribute_hero", columns={"hero_class_template_id", "attribute_id"})
 *     }
 * )
 */
class HeroClassTemplateAttributeValue
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
     * @var HeroClassTemplate
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Character\HeroClassTemplate")
     * @ORM\JoinColumn(name="hero_class_template_id", referencedColumnName="id")
     */
    protected $heroClassTemplate;

    /**
     * @var Attribute
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Statistics\Attribute")
     * @ORM\JoinCOlumn(name="attribute_id", referencedColumnName="id")
     */
    protected $attribute;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $value;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $progressPercentage;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return HeroClassTemplateAttributeValue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return HeroClassTemplate
     */
    public function getHeroClassTemplate()
    {
        return $this->heroClassTemplate;
    }

    /**
     * @param HeroClassTemplate $heroClassTemplate
     * @return HeroClassTemplateAttributeValue
     */
    public function setHeroClassTemplate($heroClassTemplate)
    {
        $this->heroClassTemplate = $heroClassTemplate;

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
     * @return HeroClassTemplateAttributeValue
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return HeroClassTemplateAttributeValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProgressPercentage()
    {
        return $this->progressPercentage;
    }

    /**
     * @param mixed $progressPercentage
     *
     * @return HeroClassTemplateAttributeValue
     */
    public function setProgressPercentage($progressPercentage)
    {
        $this->progressPercentage = $progressPercentage;

        return $this;
    }
}
