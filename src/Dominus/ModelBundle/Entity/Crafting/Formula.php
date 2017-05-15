<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 6/6/17
 * Time: 1:31 PM
 */

namespace Dominus\ModelBundle\Entity\Crafting;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Formula
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="crafting__formula"
 * )
 */
class Formula
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Dominus\ModelBundle\Entity\Gear\Gear")
     * @ORM\JoinTable(name="gear_id")
     */
    protected $reward;

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
     * @return Formula
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * @param mixed $reward
     *
     * @return Formula
     */
    public function setReward($reward)
    {
        $this->reward = $reward;

        return $this;
    }


}