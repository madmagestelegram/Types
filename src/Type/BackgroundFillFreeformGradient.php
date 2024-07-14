<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#backgroundfillfreeformgradient
 *
 * The background is a freeform gradient that rotates after every message in the chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BackgroundFillFreeformGradient extends AbstractBackgroundFill
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
            'colors',
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
            'colors' => $this->getColors(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the background fill, always “freeform_gradient” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format 
     *
     * @var int[]
     * @SerializedName("colors")
     * @Accessor(getter="getColors", setter="setColors")
     * @Type("array<int>")
     */
    protected $colors;


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
     * @param int[] $colors
     * @return static
     */
    public function setColors(array $colors): self
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getColors(): array
    {
        return $this->colors;
    }

}