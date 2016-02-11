<?php

namespace Dominus\ModelBundle\Model\Environment;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class World.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class World
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var Dominus\ModelBundle\Entity\User\User
     *
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\User\User")
     */
    protected $user;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Environment\Region", mappedBy="world")
     * @JMS\Expose
     * @JMS\Type("ArrayCollection<Dominus\ModelBundle\Entity\Environment\Region>")
     */
    protected $regions;
}
