<?php

namespace Dominus\ModelBundle\Entity\Domain;

use Doctrine\ORM\Mapping as ORM;
/**
 * Class RoomBonus
 *
 * @ORM\Entity()
 * @ORM\Table(
 *     name="domain__room_bonus"
 * )
 */
class RoomBonus
{
    const OPERATOR_CODE_ADD = 'ADD';
    const OPERATOR_CODE_REDUCE = 'REDUCE';
    const OPERATOR_CODE_UNLOCKS = 'UNLOCKS';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    protected $operatorCode;

    /**
     * @ORM\Column(type="integer")
     */
    protected $value;

    /**
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Room", mappedBy="room")
     */
    protected $room;

    /**
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Domain\Bonus")
     */
    protected $bonus;

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
     * @return RoomBonus
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperatorCode()
    {
        return $this->operatorCode;
    }

    /**
     * @param mixed $operatorCode
     *
     * @return RoomBonus
     */
    public function setOperatorCode($operatorCode)
    {
        $this->operatorCode = $operatorCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     *
     * @return RoomBonus
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * @param mixed $room
     *
     * @return RoomBonus
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * @param mixed $bonus
     *
     * @return RoomBonus
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }
}
