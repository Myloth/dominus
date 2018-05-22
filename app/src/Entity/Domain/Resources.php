<?php

namespace App\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Resources
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="domain_resources"
 * )
 */
class Resources
{
    const RESSOURCE_CREDITS = 'CREDITS';
    const RESSOURCE_FOOD    = 'FOOD';

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="smallint", options={"unsigned": true})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=50)
     */
    protected $code;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Resources
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Resources
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Resources
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}
