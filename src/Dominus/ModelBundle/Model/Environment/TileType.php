<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 12/02/16
 * Time: 13:20.
 */

namespace Dominus\ModelBundle\Model\Environment;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TileType.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
class TileType
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
     * @var string
     *
     * @ORM\Column(type="string", length=25)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $code;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Dominus\ModelBundle\Entity\Environment\Tile", mappedBy="tileType")
     * @JMS\Expose
     * @JMS\Type("ArrayCollection<Dominus\ModelBundle\Entity\Environment\Tile>")
     */
    protected $tiles;
}
