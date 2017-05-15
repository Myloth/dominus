<?php

namespace Dominus\ModelBundle\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Bonus
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="domain__bonus"
 * )
 */
class Bonus
{

    const CHARACTERS = 'CHARACTERS';
    const JOB        = 'JOB';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $code;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Bonus
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     *
     * @return Bonus
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     *
     * @return Bonus
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}
