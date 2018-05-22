<?php

namespace App\DataFixtures\ORM\User;

use App\DataFixtures\ORM\AbstractFixture;
use App\Entity\User\Group;

/**
 * Class LoadGroupData
 */
class LoadGroupData extends AbstractFixture
{
    /**
     * @inheritDoc
     */
    protected function getData()
    {
        return [
            'group-super-admin' => [
                'Super Administrateurs',
                [$this->getReference('role-super-admin')],
            ],
            'group-admin' => [
                'Administrateurs',
                [$this->getReference('role-admin')],
            ],
        ];
    }

    /**
     * @return array
     */
    protected function getDevData(): array
    {
        return [
            'group-player' => [
                'Joueurs',
                [$this->getReference('role-user')],
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    protected function buildObject(array $data)
    {
        return (new Group())
            ->setLabel($data[0])
            ->setRoles($data[1]);
    }

    /**
     * @inheritDoc
     */
    public function getOrder()
    {
        return 2;
    }
}