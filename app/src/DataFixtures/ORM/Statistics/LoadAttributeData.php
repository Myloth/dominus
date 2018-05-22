<?php

namespace App\DataFixtures\ORM\Statistics;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Statistics\Attribute;

/**
 * Class LoadAttributeData
 */
class LoadAttributeData extends AbstractFixture
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
            'attribute-strength' => [1, 'Force', Attribute::CODE_STRENGTH],
            'attribute-intel' => [2, 'Intelligence', Attribute::CODE_INTEL],
            'attribute-def' => [3, 'Défense', Attribute::CODE_DEF],
            'attribute-magic_def' => [4, 'Défense magique', Attribute::CODE_MAGIC_DEF],
            'attribute-speed' => [5, 'Vitesse', Attribute::CODE_SPEED],
            'attribute-magic-attack' => [6, 'Attaque magique', Attribute::CODE_MAGIC_ATTACK],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $attribute = (new Attribute())
            ->setId($data[0])
            ->setName($data[1])
            ->setCode($data[2]);

        return $attribute;
    }
}
