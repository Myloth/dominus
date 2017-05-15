<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Domain;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Domain\Guild;

/**
 * Class GuildFixtures
 */
class GuildFixtures extends AbstractFixture
{

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return [];
    }

    /**
     * @return array
     */
    protected function getDevData()
    {
        return [
            'new-guild' => [1, 'New guild', 1, $this->getReference('player')],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $guild = (new Guild())
            ->setId($data[0])
            ->setName($data[1])
            ->setLevel($data[2])
            ->setUser($data[3]);

        return $guild;
    }
}
