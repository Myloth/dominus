<?php

namespace App\DataFixtures\ORM\User;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\User\Role;

class LoadRoleData extends AbstractFixture
{

    protected function getData()
    {
        return [
            'role-super-admin' => ['super-admin', 'ROLE_SUPER_ADMIN'],
            'role-admin' => ['admin', 'ROLE_ADMIN'],
            'role-user' => ['user', 'ROLE_USER'],
            'role-api' => ['api', 'ROLE_API'],
        ];
    }

    protected function buildObject(array $data)
    {
        return (new Role())
            ->setLabel($data[0])
            ->setCode($data[1]);
    }

    public function getOrder()
    {
        return 1;
    }
}