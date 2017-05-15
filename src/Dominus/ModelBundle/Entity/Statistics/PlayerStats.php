<?php

namespace Dominus\ModelBundle\Entity\Statistics;

use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Entity\User\User;

/**
 * Class PlayerStats
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="statistics__player_stats"
 * )
 */
class PlayerStats
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\User\User", cascade={"persist", "remove"})
     */
    protected $user;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $endedDungeons = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="looted_gear")
     */
    protected $lootedGear = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="crafted_gear")
     */
    protected $craftedGear = 0;

    /**
     * @var int
     * @ORM\Column(type="integer", name="kill_count")
     */
    protected $killCount = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", name="played")
     */
    protected $played;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date", name="last_login")
     */
    protected $lastLogin;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PlayerStats
     */
    public function setId(int $id): PlayerStats
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return PlayerStats
     */
    public function setUser(User $user): PlayerStats
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return int
     */
    public function getEndedDungeons(): int
    {
        return $this->endedDungeons;
    }

    /**
     * @param int $endedDungeons
     * @return PlayerStats
     */
    public function setEndedDungeons(int $endedDungeons): PlayerStats
    {
        $this->endedDungeons = $endedDungeons;

        return $this;
    }

    /**
     * @return int
     */
    public function getLootedGear(): int
    {
        return $this->lootedGear;
    }

    /**
     * @param int $lootedGear
     *
     * @return PlayerStats
     */
    public function setLootedGear(int $lootedGear): PlayerStats
    {
        $this->lootedGear = $lootedGear;

        return $this;
    }

    /**
     * @return int
     */
    public function getCraftedGear(): int
    {
        return $this->craftedGear;
    }/**
 * @param int $craftedGear
 * @return PlayerStats
 */
    public function setCraftedGear(int $craftedGear): PlayerStats
    {
        $this->craftedGear = $craftedGear;

        return $this;
    }

    /**
     * @return int
     */
    public function getKillCount(): int
    {
        return $this->killCount;
    }

    /**
     * @param int $killCount
     * @return PlayerStats
     */
    public function setKillCount(int $killCount): PlayerStats
    {
        $this->killCount = $killCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getPlayed(): int
    {
        return $this->played;
    }

    /**
     * @param int $played
     * @return PlayerStats
     */
    public function setPlayed(int $played): PlayerStats
    {
        $this->played = $played;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastLogin(): \DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @param \DateTime $lastLogin
     * @return PlayerStats
     */
    public function setLastLogin(\DateTime $lastLogin): PlayerStats
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }
}
