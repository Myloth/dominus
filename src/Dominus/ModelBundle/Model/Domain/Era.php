<?php

namespace Dominus\ModelBundle\Model\Domain;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Era.
 *
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
abstract class Era
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
     * @ORM\Column(type="string", length=50)
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $name;
}
