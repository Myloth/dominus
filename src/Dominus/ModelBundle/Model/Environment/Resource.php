<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 12/02/16
 * Time: 14:01.
 */

namespace Dominus\ModelBundle\Model\Environment;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Resource.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class Resource
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $id;
}
