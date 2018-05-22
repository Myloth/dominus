<?php

namespace App\DataFixtures\ORM\Domain;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Domain\GuildTemplate;

/**
 * Class GuildTemplateFixture
 */
class GuildTemplateFixture extends AbstractFixture
{

    /**
     * @return array
     */
    protected function getData()
    {
        $hall = $this->getReference('room-hall');
        $dormitory = $this->getReference('room-dormitory');

        return [
            "lv1-hall" => [ 1, $hall, 1, 1],
            "lv1-dormitory" => [ 1, $dormitory, 1, 2]
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $template = (new GuildTemplate())
            ->setLevel($data[0])
            ->setRoom($data[1])
            ->setRoomLevel($data[2])
            ->setRoomPosition($data[3]);

        return $template;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 15;
    }
}
