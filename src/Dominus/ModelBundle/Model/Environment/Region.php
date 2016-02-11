<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 11/02/16
 * Time: 13:59.
 */

namespace Dominus\ModelBundle\Model\Environment;

use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Traits\Coordinates;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Region.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class Region
{
    use Coordinates;

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
     * @var Dominus\ModelBundle\Entity\Environment\World
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Environment\World", inversedBy="regions")
     * @ORM\JoinColumn(name="world_id", referencedColumnName="id")
     */
    protected $world;

    /**
     * @var Dominus\ModelBundle\Entity\Environment\Map
     *
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Environment\Map", mappedBy="region", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="map_id", referencedColumnName="id")
     */
    protected $map;
}
