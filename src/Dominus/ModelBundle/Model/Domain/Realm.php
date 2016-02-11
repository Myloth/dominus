<?php

namespace Dominus\ModelBundle\Model\Domain;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Dominus\ModelBundle\Entity\User\User;
use Dominus\ModelBundle\Entity\Domain\Ruler;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Realm.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class Realm
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
     * @var User
     *
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\User\User", cascade={"persist", "remove"}, mappedBy="realm")
     * @JMS\Expose
     * @JMS\Type("Dominus\ModelBundle\Entity\User\User")
     */
    protected $user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=4000)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $background;

    /**
     * @var Ruler
     *
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Ruler", mappedBy="realm", cascade={"persist", "remove"})
     * @JMS\Expose
     * @JMS\Type("Dominus\ModelBundle\Entity\Domain\Ruler")
     */
    protected $ruler;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Domain\RealmResources", mappedBy="realm", cascade={"persist", "remove"})
     * @JMS\Expose
     * @JMS\Type("ArrayCollection<Dominus\ModelBundle\Entity\Environment\Resources>")
     */
    protected $resources;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $prestige;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Domain\City", mappedBy="realm", cascade={"persist", "remove"})
     * @JMS\Expose
     * @JMS\Type("ArrayCollection<Dominus\ModelBundle\Entity\Domain\City>")
     */
    protected $cities;

    /**
     * @var Dominus\ModelBundle\Entity\Domain\Era
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Era")
     * @ORM\JoinColumn(name="era_id", referencedColumnName="id")
     */
    protected $era;
}
