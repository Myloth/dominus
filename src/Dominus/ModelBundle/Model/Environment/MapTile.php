<?php
/**
 * Created by PhpStorm.
 * User: myloth
 * Date: 11/02/16
 * Time: 23:38.
 */

namespace Dominus\ModelBundle\Model\Environment;

use Doctrine\ORM\Mapping as ORM;
use Dominus\ModelBundle\Traits\Coordinates;
use JMS\Serializer\Annotation as JMS;

/**
 * Class MapTile.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class MapTile
{
    use Coordinates;

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
     * @var Dominus\ModelBundle\Entity\Environment\Map
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Environment\Map", inversedBy="mapTiles")
     * @ORM\JoinColumn(name="map_id", referencedColumnName="id")
     */
    protected $map;

    /**
     * @var Dominus\ModelBundle\Entity\Environment\Tile
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Environment\Tile")
     * @ORM\JoinColumn(name="tile_id")
     * @JMS\Expose
     * @JMS\Type("Dominus\ModelBundle\Entity\Environment\Tile")
     */
    protected $tile;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $spriteClass;

    /**
     * @var bool
     * @ORM\Column(type="boolean")
     * @JMS\Expose
     * @JMS\Type("boolean")
     */
    protected $fogged;

    /**
     * @var Dominus\ModelBundle\Entity\Environment\Building
     *
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Environment\Building")
     */
    protected $building;
}
