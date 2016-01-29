<?php
/**
 * Created by PhpStorm.
 * User: myloth
 * Date: 09/02/16
 * Time: 23:07
 */

namespace Dominus\ModelBundle\Model\Domain;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;


/**
 * Class Ruler
 * @package Dominus\ModelBundle\Model\Domain
 *
 * @ORM\Entity()
 * @ORM\Table(name="domain__ruler")
 * @Serializer\ExclusionPolicy("all")
 */
class Ruler
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @Serializer\Expose
     * @Serializer\Type("integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Serializer\Expose
     * @Serializer\Type("string")
     */
    protected $name;
}