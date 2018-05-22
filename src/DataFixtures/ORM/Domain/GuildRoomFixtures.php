<?php

namespace App\DataFixtures\ORM\Domain;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Domain\GuildRoom;

/**
 * Class GuildRoomFixtures
 */
class GuildRoomFixtures extends AbstractFixture
{

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * @return array
     */
    protected function getDevData()
    {
        return [
            'guild-room-new-hall' => [
                1,
                $this->getReference('new-guild'),
                $this->getReference('room-hall'),
                1,
                1,
            ],
            [
                2,
                $this->getReference('new-guild'),
                $this->getReference('room-dormitory'),
                2,
                1,
            ],
        ];
    }

    /**
     * @param array $data
     *
     * @return GuildRoom
     */
    protected function buildObject(array $data)
    {
        $guildRoom = (new GuildRoom())
            ->setId($data[0])
            ->setGuild($data[1])
            ->setRoom($data[2])
            ->setPosition($data[3])
            ->setLevel($data[4]);

        return $guildRoom;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return [];
    }
}
