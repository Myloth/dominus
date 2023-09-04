<?php

namespace App\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ApiUser extends AbstractUser
{
    /**
     * Hashed string used to generate an api connection token.
     *
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private string|null $salt;

    /**
     * @return string|null
     */
    public function getSalt(): ?string
    {
        return $this->salt;
    }

    /**
     * @param string|null $salt
     * @return ApiUser
     */
    public function setSalt(?string $salt): ApiUser
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return self::USER_TYPE_API;
    }
}
