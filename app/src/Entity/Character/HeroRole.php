<?php

namespace App\Entity\Character;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class HeroRole
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="character__hero_role"
 * )
 */
class HeroRole
{
    const CODE_DEFENSE = 'DEFENSE';
    const CODE_PHYSICAL_OFFENSE = 'PHYSICAL_OFFENSE';
    const CODE_MAGICAL_OFFENSE = 'MAGICAL_OFFENSE';
    const CODE_SUPPORT = 'SUPPORT';

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
     * @return HeroRole
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
     * @return HeroRole
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
     * @return HeroRole
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}
