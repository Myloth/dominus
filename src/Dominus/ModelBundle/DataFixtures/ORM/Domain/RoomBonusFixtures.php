<?php

namespace Dominus\ModelBundle\DataFixtures\ORM\Domain;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Crafting\Job;
use Dominus\ModelBundle\Entity\Domain\RoomBonus;

/**
 * Class RoomBonusFixtures
 */
class RoomBonusFixtures extends AbstractFixture
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
        /** @var Job $jobForge */
        $jobForge = $this->getReference('job-forge');

        return [
            'room-bonus-unlocks-forge' => [
                1,
                $this->getReference('room-forge'),
                $this->getReference('bonus-job'),
                RoomBonus::OPERATOR_CODE_UNLOCKS,
                $jobForge->getId(),
            ],
            'room-bonus-add-characters' => [
                2,
                $this->getReference('room-dormitory'),
                $this->getReference('bonus-characters'),
                RoomBonus::OPERATOR_CODE_ADD,
                10,
            ],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        $roomBonus = (new RoomBonus())
            ->setId($data[0])
            ->setRoom($data[1])
            ->setBonus($data[2])
            ->setOperatorCode($data[3])
            ->setValue($data[4]);

        return $roomBonus;
    }
}
