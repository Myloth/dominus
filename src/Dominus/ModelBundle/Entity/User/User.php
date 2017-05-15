<?php

namespace Dominus\ModelBundle\Entity\User;

use Dominus\ModelBundle\Entity\Statistics\PlayerStats;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User.
 *
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var PlayerStats
     *
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Statistics\PlayerStats", cascade={"persist", "remove"})
     */
    protected $playerStats;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return User
     */
    public function setId(int $id) : User
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return PlayerStats
     */
    public function getPlayerStats() : PlayerStats
    {
        return $this->playerStats;
    }

    /**
     * @param PlayerStats $playerStats
     *
     * @return User
     */
    public function setPlayerStats(PlayerStats $playerStats) : User
    {
        $this->playerStats = $playerStats;

        return $this;
    }
}
