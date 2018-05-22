<?php

namespace App\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class GuildTemplate
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="domain__guild_template"
 * )
 */
class GuildTemplate
{
    const NEW_PLAYER = 1;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", options={"unsigned": true})
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint", options={"unsigned": true})
     */
    private $level;

    /**
     * @var Room
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Domain\Room")
     * @ORM\JoinColumn(name="room_id")
     */
    private $room;

    /**
     * @var int
     *
     * @ORM\Column(name="room_level", type="integer", options={"unsigned": true})
     */
    private $roomLevel;

    /**
     * @var int
     *
     * @ORM\Column(name="room_position", type="integer", options={"unsigned": true})
     */
    private $roomPosition;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return GuildTemplate
     */
    public function setLevel(int $level): GuildTemplate
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Room
     */
    public function getRoom(): Room
    {
        return $this->room;
    }

    /**
     * @param Room $room
     * @return GuildTemplate
     */
    public function setRoom(Room $room): GuildTemplate
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return int
     */
    public function getRoomLevel(): int
    {
        return $this->roomLevel;
    }

    /**
     * @param int $roomLevel
     * @return GuildTemplate
     */
    public function setRoomLevel(int $roomLevel): GuildTemplate
    {
        $this->roomLevel = $roomLevel;

        return $this;
    }

    /**
     * @return int
     */
    public function getRoomPosition()
    {
        return $this->roomPosition;
    }

    /**
     * @param int $roomPosition
     * @return GuildTemplate
     */
    public function setRoomPosition($roomPosition)
    {
        $this->roomPosition = $roomPosition;

        return $this;
    }
}
