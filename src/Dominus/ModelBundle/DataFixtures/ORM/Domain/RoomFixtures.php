<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Domain;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Domain\Room;

/**
 * Class RoomFixtures
 */
class RoomFixtures extends AbstractFixture
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
            'room-hall' => [
                1,
                'Hall de guilde',
                'Entrée du batiment',
                1,
                1,
            ],
            'room-dormitory' => [
                2,
                'Dortoir',
                'Les chambres des membres de votre guilde',
                1,
                5,
            ],
            'room-forge' => [
                3,
                'Forge',
                'Artisanat : débloque le métier de forgeron',
                1,
                5,
            ],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $room = (new Room())
            ->setId($data[0])
            ->setName($data[1])
            ->setDescription($data[2])
            ->setMaxBuilding($data[3])
            ->setMaxLevel($data[4]);

        return $room;
    }
}
