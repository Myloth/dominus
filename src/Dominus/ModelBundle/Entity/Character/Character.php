<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 5/16/17
 * Time: 1:47 PM
 */

namespace Dominus\ModelBundle\Entity\Character;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Character
 *
 * @ORM\MappedSuperclass
 */
abstract class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Guild")
     */
    protected $guild;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGuild()
    {
        return $this->guild;
    }

    /**
     * @param mixed $guild
     */
    public function setGuild($guild)
    {
        $this->guild = $guild;
    }
}