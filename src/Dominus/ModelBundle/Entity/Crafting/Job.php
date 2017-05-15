<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 5/18/17
 * Time: 2:09 PM
 */

namespace Dominus\ModelBundle\Entity\Crafting;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Job
 *
 * @ORM\Entity
 * @ORM\Table(name="crafting__job")
 */
class Job
{

    const JOB_FORGE = 'FORGE';
    const JOB_HERBORISM = 'HERBORISM';
    const JOB_TAILORING = 'TAILORING';

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
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
     * @return Job
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
     * @return Job
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
     * @return Job
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }


}