<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 11/02/16
 * Time: 11:16.
 */

namespace Dominus\ModelBundle\Model\Domain;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class City.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class City
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @JMS\Expose()
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $name;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $capital;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $citizens;

    /**
     * @var Realm
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Realm", inversedBy="cities")
     * @JMS\Expose
     * @JMS\Type("Dominus\ModelBundle\Domain\Realm")
     */
    protected $realm;
}
