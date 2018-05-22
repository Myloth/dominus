<?php

namespace App\Entity\User;

use App\Entity\Statistics\PlayerStats;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User\Group")
     * @ORM\JoinTable(name="user__user_groups",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    private $groups;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * If this user can be used to log in the administration
     *
     * @var string
     * @ORM\Column(type="boolean")
     */
    private $canConnect = 0;

    /**
     * Hashed string used to generate an api connection token.
     *
     * @var string
     * @ORM\Column(type="string")
     */
    private $salt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = [];
        /** @var Group $group */
        foreach ($this->groups as $group) {
            /** @var Role $role */
            foreach ($group->getRoles() as $role) {
                $roles[] = $role->getCode();
            }
        }

        return array_unique($roles);
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param User $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return PlayerStats
     */
    public function getPlayerStats(): PlayerStats
    {
        return $this->playerStats;
    }

    /**
     * @param PlayerStats $playerStats
     *
     * @return User
     */
    public function setPlayerStats(PlayerStats $playerStats): User
    {
        $this->playerStats = $playerStats;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $groups
     *
     * @return User
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return string
     */
    public function getCanConnect(): string
    {
        return $this->canConnect;
    }

    /**
     * @param string $canConnect
     *
     * @return User
     */
    public function setCanConnect(string $canConnect): User
    {
        $this->canConnect = $canConnect;

        return $this;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     *
     * @return User
     */
    public function setSalt(string $salt): User
    {
        $this->salt = $salt;

        return $this;
    }
}
