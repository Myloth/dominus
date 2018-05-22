<?php

namespace App\DataFixtures\ORM\User;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\Statistics\PlayerStats;
use App\Entity\User\User;


class LoadUserData extends AbstractFixture
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
            "admin-user" => ['admin', 'test', 'test@example.com'],
        ];
    }

    /**
     * @return array
     */
    protected function getDevData()
    {
        return [
            'player' => ['Myloth', 'password', 'asensijoel@gmail.com'],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $user = (new User())
            ->setUsername($data[0])
            ->setPassword($data[1])
            ->setEmail($data[2])
            ->setPlayerStats(new PlayerStats());

        return $user;
    }

}