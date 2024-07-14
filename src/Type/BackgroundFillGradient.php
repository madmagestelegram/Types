<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#backgroundfillgradient
 *
 * The background is a gradient fill. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BackgroundFillGradient extends AbstractBackgroundFill
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'type',
            'top_color',
            'bottom_color',
            'rotation_angle',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getData(): array
    {
        $result = [
            'type' => $this->getType(),
            'top_color' => $this->getTopColor(),
            'bottom_color' => $this->getBottomColor(),
            'rotation_angle' => $this->getRotationAngle(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the background fill, always “gradient” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Top color of the gradient in the RGB24 format 
     *
     * @var int
     * @SerializedName("top_color")
     * @Accessor(getter="getTopColor", setter="setTopColor")
     * @Type("int")
     */
    protected $topColor;

    /**
     * Bottom color of the gradient in the RGB24 format 
     *
     * @var int
     * @SerializedName("bottom_color")
     * @Accessor(getter="getBottomColor", setter="setBottomColor")
     * @Type("int")
     */
    protected $bottomColor;

    /**
     * Clockwise rotation angle of the background fill in degrees; 0-359 
     *
     * @var int
     * @SerializedName("rotation_angle")
     * @Accessor(getter="getRotationAngle", setter="setRotationAngle")
     * @Type("int")
     */
    protected $rotationAngle;


    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param int $topColor
     * @return static
     */
    public function setTopColor(int $topColor): self
    {
        $this->topColor = $topColor;

        return $this;
    }

    /**
     * @return int
     */
    public function getTopColor(): int
    {
        return $this->topColor;
    }

    /**
     * @param int $bottomColor
     * @return static
     */
    public function setBottomColor(int $bottomColor): self
    {
        $this->bottomColor = $bottomColor;

        return $this;
    }

    /**
     * @return int
     */
    public function getBottomColor(): int
    {
        return $this->bottomColor;
    }

    /**
     * @param int $rotationAngle
     * @return static
     */
    public function setRotationAngle(int $rotationAngle): self
    {
        $this->rotationAngle = $rotationAngle;

        return $this;
    }

    /**
     * @return int
     */
    public function getRotationAngle(): int
    {
        return $this->rotationAngle;
    }

}