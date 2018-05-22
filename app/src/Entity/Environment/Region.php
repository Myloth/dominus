<?php

namespace App\Entity\Environment;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Region.
 *
 * @ORM\Entity
 * @ORM\Table(name="environment__region")
 * @JMS\ExclusionPolicy("all")
 */
class Region
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var App\Entity\Environment\World
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Environment\World", inversedBy="regions")
     * @ORM\JoinColumn(name="world_id", referencedColumnName="id")
     */
    protected $world;


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
     * @return Region
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return World
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * @param World $world
     *
     * @return Region
     */
    public function setWorld(World $world)
    {
        $this->world = $world;

        return $this;
    }
}
