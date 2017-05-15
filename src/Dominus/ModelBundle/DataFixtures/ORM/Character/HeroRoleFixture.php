<?php


namespace Dominus\ModelBundle\DataFixtures\ORM\Character;

use Dominus\ModelBundle\DataFixtures\ORM\AbstractFixture;
use Dominus\ModelBundle\Entity\Character\HeroRole;

/**
 * Class HeroRoleFixture
 */
class HeroRoleFixture extends AbstractFixture
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
            'role-physical-offense' => [
                'Dommages physique',
                HeroRole::CODE_PHYSICAL_OFFENSE,
            ],
            'role-magical-offense' => [
                'Dommages magiques',
                HeroRole::CODE_MAGICAL_OFFENSE,
            ],
            'role-defense' => [
                'Défense',
                HeroRole::CODE_DEFENSE,
            ],
            'role-support' => [
                'Support',
                HeroRole::CODE_SUPPORT,
            ],
        ];
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function buildObject(array $data)
    {
        return (new HeroRole())
            ->setName($data[0])
            ->setCode($data[1]);
    }
}
