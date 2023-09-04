<?php

namespace App\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AbstractUserRepository;

/**
 * Class AbstractUser
 *
 * @ORM\Entity(repositoryClass=AbstractUserRepository::class)
 * @ORM\Table(name="user__user")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"USER" = "User", "API" = "ApiUser"})
 */
abstract class AbstractUser
{
    public const USER_TYPE_API = 'API';
    public const USER_TYPE_USER = 'USER';

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=180, unique=true)
     */
    protected string|null $username;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default":true})
     */
    protected bool $active;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return AbstractUser
     */
    public function setUsername(string $username): AbstractUser
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     *
     * @return AbstractUser
     */
    public function setActive(bool $active): AbstractUser
    {
        $this->active = $active;

        return $this;
    }
}
