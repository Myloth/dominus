<?php

namespace App\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class GuildRessource
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="domain__guild_resource"
 * )
 */
class GuildResource
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer", options={"unsigned": true})
     */
    protected $id;

    /**
     * @var Resources
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Domain\Resources")
     */
    protected $resource;

    /**
     * @var Guild
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Domain\Guild")
     */
    protected $guild;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $value;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return GuildResource
     */
    public function setId(int $id): GuildResource
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Resources
     */
    public function getRessource(): Resources
    {
        return $this->resource;
    }

    /**
     * @param Resources $ressource
     *
     * @return GuildResource
     */
    public function setRessource(Resources $resource): GuildResource
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * @return Guild
     */
    public function getGuild(): Guild
    {
        return $this->guild;
    }

    /**
     * @param Guild $guild
     *
     * @return GuildResource
     */
    public function setGuild(Guild $guild): GuildResource
    {
        $this->guild = $guild;

        return $this;
    }

    /**
     * @return int
     */
    public function getValue() : int
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return GuildResource
     */
    public function setValue($value) : GuildResource
    {
        $this->value = $value;

        return $this;
    }


}
