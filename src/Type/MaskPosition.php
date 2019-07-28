<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#maskposition
 *
 * This object describes the position on faces where a mask should be placed by default. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MaskPosition extends AbstractType
{
    /**
     * The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or “chin”.
     *
     * @var string
     * @SerializedName("point")
     * @Accessor(getter="getPoint",setter="setpoint")
     * @Type("string")
     */
    protected $point;

    /**
     * Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing -1.0 will place mask just to the left of the default mask position.
     *
     * @var float
     * @SerializedName("x_shift")
     * @Accessor(getter="getXShift",setter="setxShift")
     * @Type("float")
     */
    protected $xShift;

    /**
     * Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will place the mask just below the default mask position.
     *
     * @var float
     * @SerializedName("y_shift")
     * @Accessor(getter="getYShift",setter="setyShift")
     * @Type("float")
     */
    protected $yShift;

    /**
     * Mask scaling coefficient. For example, 2.0 means double size.
     *
     * @var float
     * @SerializedName("scale")
     * @Accessor(getter="getScale",setter="setscale")
     * @Type("float")
     */
    protected $scale;


    /**
     * @param string $point
     * @return static
     */
    public function setPoint(string $point): self
    {
        $this->point = $point;

        return $this;
    }

    /**
     * @return string
     */
    public function getPoint(): string
    {
        return $this->point;
    }

    /**
     * @param float $xShift
     * @return static
     */
    public function setXShift(float $xShift): self
    {
        $this->xShift = $xShift;

        return $this;
    }

    /**
     * @return float
     */
    public function getXShift(): float
    {
        return $this->xShift;
    }

    /**
     * @param float $yShift
     * @return static
     */
    public function setYShift(float $yShift): self
    {
        $this->yShift = $yShift;

        return $this;
    }

    /**
     * @return float
     */
    public function getYShift(): float
    {
        return $this->yShift;
    }

    /**
     * @param float $scale
     * @return static
     */
    public function setScale(float $scale): self
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * @return float
     */
    public function getScale(): float
    {
        return $this->scale;
    }

}