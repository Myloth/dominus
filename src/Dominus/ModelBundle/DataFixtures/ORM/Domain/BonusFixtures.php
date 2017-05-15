<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Domain;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Domain\Bonus;

/**
 * Class BonusFixtures
 */
class BonusFixtures extends AbstractFixture
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
            'bonus-characters' => [1, 'Personnages', Bonus::CHARACTERS],
            'bonus-job' => [2, 'Artisanat', Bonus::JOB],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $bonus = (new Bonus())
            ->setId($data[0])
            ->setName($data[1])
            ->setCode($data[2]);

        return $bonus;
    }
}
