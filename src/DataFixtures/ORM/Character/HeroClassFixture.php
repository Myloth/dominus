<?php

namespace App\DataFixtures\ORM\Character;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Character\HeroClass;

/**
 * Class HeroClassFixture
 */
class HeroClassFixture extends AbstractFixture
{

    /**
     * @return array
     */
    protected function getData()
    {
        $attributeStrength = $this->getReference('attribute-strength');
        $armorTypeHeavy = $this->getReference('gear-heavy-armor');


        return [
            'hero-class-warrior' => [
                "Guerrier",
                HeroClass::CODE_WARRIOR,
                $armorTypeHeavy,
                $attributeStrength,
            ],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        return (new HeroClass())
            ->setName($data[0])
            ->setCode($data[1])
            ->setArmorType($data[2])
            ->setMainAttribute($data[3]);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}
