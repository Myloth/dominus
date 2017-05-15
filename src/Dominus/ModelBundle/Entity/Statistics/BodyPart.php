<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 5/19/17
 * Time: 4:51 PM
 */

namespace Dominus\ModelBundle\Entity\Statistics;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class BodyPart
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="statistics__body_part",
 *     indexes={
 *          @ORM\Index(name="idx_body_part_code", columns={"code"})
 *     }
 * )
 */
class BodyPart
{

    const HEAD = 'HEAD';
    const ARMS = 'ARMS';
    const BODY = 'BODY';
    const LEGS = 'LEGS';
    const FOOT = 'FOOT';
    const RIGHT_HAHD = 'RIGHT_HAND';
    const LEFT_HAND = 'LEFT_HAND';
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
     * @ORM\Column(type="string", length=30)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30)
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
     * @return BodyPart
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
     * @return BodyPart
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
     * @return BodyPart
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }


}