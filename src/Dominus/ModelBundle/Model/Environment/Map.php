<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 11/02/16
 * Time: 14:07.
 */

namespace Dominus\ModelBundle\Model\Environment;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Map.
 *
 * @ORM\MappedSuperclass
 */
abstract class Map
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
     * @var Dominus\ModelBundle\Entity\Environment\Region
     *
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Environment\Region")
     */
    protected $region;
}
