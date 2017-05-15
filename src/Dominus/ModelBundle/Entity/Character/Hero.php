<?php

namespace Dominus\ModelBundle\Entity\Character;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Entity\Gear\Gear;

/**
 * Class Hero
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="character__hero"
 * )
 */
class Hero extends Character
{
    /**
     * @var HeroClass
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Character\HeroClass")
     */
    protected $class;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Statistics\AttributeValue", mappedBy="hero")
     */
    protected $attributeSet;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $level;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Character\HeroGear", mappedBy="hero")
     */
    protected $equipment;

    /**
     * @return HeroClass
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param HeroClass $class
     *
     * @return Hero
     */
    public function setClass($class)
    {
        $this->class = $class;

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
     * @return Hero
     */
    public function setAttributeSet($attributeSet)
    {
        $this->attributeSet = $attributeSet;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     *
     * @return Hero
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * @param ArrayCollection $equipment
     *
     * @return Hero
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;

        return $this;
    }

    /**
     * Gets base statistics for the hero
     *
     * @return array
     */
    public function getBaseStatistics()
    {
        $stats = [];

        foreach ($this->attributeSet as $attributeValue)
        {
            $attributeCode = $attributeValue->getAttribute()->getCode();
            if (!array_key_exists( $attributeCode, $stats)) {
                $stats[$attributeCode] = $attributeValue->getValue();
            } else {
                $stats[$attributeCode] += $attributeValue->getValue();
            }
        }

        return $stats;
    }

    /**
     * Gets specific base statistic value
     *
     * @param string $attributeCode
     *
     * @return int|null
     */
    public function getBaseStatisticValue($attributeCode)
    {
        $stats = $this->getBaseStatistics();

        return $stats[$attributeCode] ? : null;
    }

    /**
     * Gets the equipment statistics values
     *
     * @return array
     */
    public function getEquipmentStatistics()
    {
        $stats = [];

        /** @var Gear $gear */
        foreach ($this->equipment as $gear) {
            foreach( $gear->getAttributeSet() as $attributeValue) {
                $attributeCode = $attributeValue->getAttribute()->getCode();
                if (!array_key_exists( $attributeCode, $stats)) {
                    $stats[$attributeCode] = $attributeValue->getValue();
                } else {
                    $stats[$attributeCode] += $attributeValue->getValue();
                }
            }
        }

        return $stats;
    }

    /**
     * Gets specific equipment statistic value
     *
     * @param string $attributeCode
     *
     * @return int|null
     */
    public function getEquipmentStatisticValue($attributeCode)
    {
        $stats = $this->getEquipmentStatistics();

        return $stats[$attributeCode] ? : null;
    }

    /**
     * Gets global stats
     *
     * @return array
     */
    public function getGlobalStatistics()
    {
        $stats = [];
        $base = $this->getBaseStatistics();
        $equipment = $this->getEquipmentStatistics();

        foreach ($base as $code => $baseStatistic) {
            $stats[$code] = $baseStatistic;

            if(isset($equipment[$code])) {
                $stats[$code] += $equipment[$code];
            }
        }

        return $stats;
    }

    /**
     * Gets specific global statistic value
     *
     * @param string $attributeCode
     *
     * @return int|null
     */
    public function getGlobalStatisticValue($attributeCode)
    {
        $stats = $this->getGlobalStatistics();

        return $stats[$attributeCode] ? : null;
    }
}
