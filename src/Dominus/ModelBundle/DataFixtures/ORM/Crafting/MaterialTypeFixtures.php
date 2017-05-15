<?php


namespace Dominus\ModelBundle\DataFixtures\ORM\Crafting;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Crafting\MaterialType;

/**
 * Class MaterialTypeFixtures
 */
class MaterialTypeFixtures extends AbstractFixture
{

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            'material-type-metal' => [1, "Métal", MaterialType::CODE_METAL],
            'material-type-leather' => [2, "Cuir", MaterialType::CODE_LEATHER],
            'material-type-fabric' => [3, "Tissu", MaterialType::CODE_FABRIC],
            'material-type-vegetal' => [4, "Végétal", MaterialType::CODE_VEGETAL],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $materialType = (new MaterialType())
            ->setId($data[0])
            ->setName($data[1])
            ->setCode($data[2]);

        return $materialType;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}
