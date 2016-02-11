<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Domain;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Domain\Ruler;

class LoadRulerData extends AbstractFixture
{
    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return [
            'lord-stark' => [
                "Lord Stark",
                "Ceci est un souverain test",
            ],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $ruler = new Ruler();
        $ruler->setName($data[0])
            ->setBackground($data[1]);

        return $ruler;
    }
}