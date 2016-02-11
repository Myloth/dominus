<?php
/**
 * Created by PhpStorm.
 * User: myloth
 * Date: 11/02/16
 * Time: 23:48.
 */

namespace Dominus\ModelBundle\Traits;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Coordinates.
 */
trait Coordinates
{
    /**
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $xAxis;

    /**
     * @ORM\Column(type="integer")
     * @JMS\Expose
     * @JMS\Type("integer")
     */
    protected $yAxis;

    /**
     * @return mixed
     */
    public function getXAxis()
    {
        return $this->xAxis;
    }

    /**
     * @param $xAxis
     *
     * @return $this
     */
    public function setXAxis($xAxis)
    {
        $this->xAxis = $xAxis;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * @param $yAxis
     *
     * @return $this
     */
    public function setYAxis($yAxis)
    {
        $this->yAxis = $yAxis;

        return $this;
    }
}
