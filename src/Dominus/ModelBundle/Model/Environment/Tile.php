<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 11/02/16
 * Time: 14:14.
 */

namespace Dominus\ModelBundle\Model\Environment;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Tile.
 *
 * @ORM\MappedSupperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class Tile
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
     * @var Dominus\ModelBundle\Entity\Environment\TileType
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Environment\TileType", inversedBy="tiles")
     * @ORM\JoinColumn(name="tile_type_id")
     */
    protected $tileType;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", name="land_move_allowed")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $landMoveAllowed;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", name="water_move_allowed")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $waterMoveAllowed;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", name="air_move_allowed")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $airMoveAllowed;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $buildable;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $resourceAllowed;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $reliefCode;
}
