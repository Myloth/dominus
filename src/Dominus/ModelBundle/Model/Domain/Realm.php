<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 08/02/16
 * Time: 13:25
 */

namespace Dominus\ModelBundle\Model\Domain;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Realm
 * @package Dominus\ModelBundle\Model\Domain
 *
 * @ORM\Entity()
 * @ORM\Table(name="domain__realm")
 * @Serializer\ExclusionPolicy("all")
 */
class Realm
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Serialiser\Expose
     * @Serializer\Type("integer")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\User\User", cascade={"persist", "delete"}, mappedBy="realm")
     * @Serializer\Expose
     * @Serializer\Type("Dominus\ModelBundle\Entity\User\User")
     */
    protected $user;

    /**
     * @ORM\Column(type="string", length="255")
     * @Serializer\Expose
     * @Serializer\Type("string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=4000)
     * @Serializer\Expose
     * @Serializer\Type("string")
     */
    protected $background;

    /**
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Ruler", mappedBy="realm", cascade={"persist", "delete"})
     * @Serializer\Expose
     * @Serializer\Type("Dominus\ModelBundle\Entity\Domain\Ruler")
     */
    protected $ruler;

    /**
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Domain\RealmResources", mappedBy="realm", cascade={"persist", "delete"})
     * @Serializer\Expose
     * @Serializer\Type("ArrayCollection<Dominus\ModelBundle\Entity\Environment\Resources>")
     */
    protected $resources;

    /**
     * @ORM\Column(type="integer")
     * @Serializer\Expose
     * @Serializer\Type("integer")
     */
    protected $prestige;

    /**
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Domain\City", mappedBy="realm", cascade={"persist", "delete"})
     * @Serializer\Expose
     * @Serializer\Type("ArrayCollection<Dominus\ModelBundle\Entity\Domain\City>")
     */
    protected $cities;

    /**
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Era")
     * @ORM\JoinColumn(name="era_id", referencedColumnName="id")
     */
    protected $era;
}