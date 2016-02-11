<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 12/02/16
 * Time: 14:08.
 */

namespace Dominus\ModelBundle\Model\Domain;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class RealmResource.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class RealmResources
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Realm", inversedBy="resources")
     * @ORM\JoinColumn(name="realm_id")
     * @JMS\Expose
     * @JMS\Type("Dominus\ModelBundle\Entity\Domain\Realm")
     */
    protected $realm;

    /**
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Environment\Resource")
     * @ORM\JoinColumn(name="resource_id")
     * @JMS\Expose
     * @JMS\Type("Dominus\ModelBundle\Entity\Environment\Resource")
     */
    protected $resource;

    /**
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $quantity;
}
