<?php

namespace App\Entity\Domain;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\User\User;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Guild
 *
 * @ORM\Entity
 * @ORM\Table("domain__guild")
 */
class Guild
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
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="App\Entity\User\User")
     */
    protected $user;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $level;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Domain\GuildRoom", mappedBy="guild", cascade={"persist", "remove"})
     */
    protected $rooms;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rooms = new ArrayCollection();
    }

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
     * @return Guild
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Guild
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     *
     * @return Guild
     */
    public function setUser($user)
    {
        $this->user = $user;

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
     * @return Guild
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Guild
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getRooms(): ArrayCollection
    {
        return $this->rooms;
    }

    /**
     * @param GuildRoom $room
     *
     * @return Guild
     */
    public function addRoom(GuildRoom $room): Guild
    {
        $this->rooms->add($room);

        return $this;
    }
}