<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\User;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\User\User;


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
        $user = new User();
        $user->setUsername($data[0]);
        $user->setPassword($data[1]);
        $user->setEmail($data[2]);

        return $user;
    }

}