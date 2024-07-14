<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#backgroundfillsolid
 *
 * The background is filled using the selected color. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BackgroundFillSolid extends AbstractBackgroundFill
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
            'color',
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
            'color' => $this->getColor(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the background fill, always “solid” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * The color of the background fill in the RGB24 format 
     *
     * @var int
     * @SerializedName("color")
     * @Accessor(getter="getColor", setter="setColor")
     * @Type("int")
     */
    protected $color;


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
     * @param int $color
     * @return static
     */
    public function setColor(int $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return int
     */
    public function getColor(): int
    {
        return $this->color;
    }

}