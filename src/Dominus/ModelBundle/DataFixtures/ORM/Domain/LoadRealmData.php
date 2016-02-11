<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Domain;


use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Domain\Realm;

class LoadRealmData extends AbstractFixture
{
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }

    protected function getData()
    {
        return [
            "north-realm" => [
                "North",
                $this->getReference('admin-user'),
                $this->getReference('lord-stark'),
                "Ceci est un royaume de test",
                0
            ],

        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $realm = new Realm();
        $realm->setName($data[0])
            ->setUser($data[1])
            ->setRuler($data[2])
            ->setBackground($data[3])
            ->setPrestige($data[4]);

        return $realm;
    }
}