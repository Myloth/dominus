<?php
/**
 * Created by PhpStorm.
 * User: joel
 * Date: 5/18/17
 * Time: 1:58 PM
 */

namespace Dominus\ModelBundle\Entity\Statistics;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AttributeValue
 *
 * @ORM\Entity
 * @ORM\Table(name="statistics__attribute_value")
 */
class AttributeValue
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
     * @var Attribute
     *
     * @ORM\ManyToOne(targetEntity="Dominus\ModelBundle\Entity\Statistics\Attribute")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id")
     */
    protected $attribute;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $value;

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
     * @return AttributeValue
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return Attribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param Attribute $attribute
     *
     * @return AttributeValue
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int $value
     *
     * @return AttributeValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }


}