<?php

namespace App\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class GuildRoom
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="domain__guild_room",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint(name="guild_room_unq", columns={"guild_id", "position"})
 *     }
 * )
 */
class GuildRoom
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
     * @var Guild
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Domain\Guild", inversedBy="rooms")
     * @ORM\JoinColumn(name="guild_id", referencedColumnName="id")
     */
    protected $guild;

    /**
     * @var Room
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Domain\Room")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
     */
    protected $room;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $level;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $position;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return GuildRoom
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Guild
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * @param Guild $guild
     *
     * @return GuildRoom
     */
    public function setGuild($guild)
    {
        $this->guild = $guild;

        return $this;
    }

    /**
     * @return Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param Room $room
     *
     * @return GuildRoom
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     *
     * @return GuildRoom
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     *
     * @return GuildRoom
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }
}
