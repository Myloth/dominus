<?php

namespace App\DataFixtures\ORM\Gear;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Gear\GearType;

/**
 * Class GearTypeFixture
 */
class GearTypeFixture extends AbstractFixture
{

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            'gear-light-armor' => [1, 'Armure légère', GearType::CODE_ARMOR_TYPE, GearType::CODE_ARMOR_LIGHT],
            'gear-medium-armor' => [2, 'Armure moyenne', GearType::CODE_ARMOR_TYPE, GearType::CODE_ARMOR_MEDIUM],
            'gear-heavy-armor' => [3, 'Armure lourde', GearType::CODE_ARMOR_TYPE, GearType::CODE_ARMOR_HEAVY],
            'gear-melee-rh-weapon' => [
                4,
                'Arme de mélée, main droite',
                GearType::CODE_WEAPON_TYPE,
                GearType::CODE_WEAPON_MELEE_RIGHT_HAND,
            ],
            'gear-melee-lh-weapon' => [
                5,
                'Arme de mélée, main gauche',
                GearType::CODE_WEAPON_TYPE,
                GearType::CODE_WEAPON_MELEE_LEFT_HAND,
            ],
            'gear-melee-bh-weapon' => [
                6,
                'Arme de mélée, deux mains',
                GearType::CODE_WEAPON_TYPE,
                GearType::CODE_WEAPON_MELEE_TWO_HANDS,
            ],
            'gear-distant-bh-weapon' => [
                7,
                'Arme distante, deux mains',
                GearType::CODE_WEAPON_TYPE,
                GearType::CODE_WEAPON_DISTANT_TWO_HANDS,
            ],
            'gear-distant-rh-weapon' => [
                8,
                'Arme distante, main droite',
                GearType::CODE_WEAPON_TYPE,
                GearType::CODE_WEAPON_DISTANT_RIGHT_HAND,
            ],
            'gear-distant-lh->weapon' => [
                8,
                'Arme distante, main gauche',
                GearType::CODE_WEAPON_TYPE,
                GearType::CODE_WEAPON_DISTANT_LEFT_HAND,
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return GearType
     */
    protected function buildObject(array $data)
    {
        $gearType = (new GearType())
            ->setId($data[0])
            ->setName($data[1])
            ->setType($data[2])
            ->setCode($data[3]);

        return $gearType;
    }
}
