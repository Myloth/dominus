<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Crafting;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Crafting\Material;

/**
 * Class MaterialFixtures
 */
class MaterialFixtures extends AbstractFixture
{

    /**
     * @return array
     */
    protected function getData()
    {
        $metal = $this->getReference('material-type-metal');
        $leather = $this->getReference('material-type-leather');
        $fabric = $this->getReference('material-type-fabric');

        return [
            'material-copper' => [1, "Cuivre", "", $metal],
            'material-iron' => [2, "Fer", "", $metal],
            'material-light-leather' => [3, "Cuir léger", "", $leather],
            'material-linnen' => [4, "Lin", "", $fabric],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        return (new Material())
            ->setId($data[0])
            ->setName($data[1])
            ->setCode($data[2])
            ->setMaterialType($data[3]);
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
