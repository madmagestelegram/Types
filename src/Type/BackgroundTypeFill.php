<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#backgroundtypefill
 *
 * The background is automatically filled based on the selected colors. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BackgroundTypeFill extends AbstractBackgroundType
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
            'fill',
            'dark_theme_dimming',
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
            'fill' => $this->getFill(),
            'dark_theme_dimming' => $this->getDarkThemeDimming(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the background, always “fill” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * The background fill 
     *
     * @var AbstractBackgroundFill
     * @SerializedName("fill")
     * @Accessor(getter="getFill", setter="setFill")
     * @Type("MadmagesTelegram\Types\Type\AbstractBackgroundFill")
     */
    protected $fill;

    /**
     * Dimming of the background in dark themes, as a percentage; 0-100 
     *
     * @var int
     * @SerializedName("dark_theme_dimming")
     * @Accessor(getter="getDarkThemeDimming", setter="setDarkThemeDimming")
     * @Type("int")
     */
    protected $darkThemeDimming;


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
     * @param AbstractBackgroundFill $fill
     * @return static
     */
    public function setFill(AbstractBackgroundFill $fill): self
    {
        $this->fill = $fill;

        return $this;
    }

    /**
     * @return AbstractBackgroundFill
     */
    public function getFill(): AbstractBackgroundFill
    {
        return $this->fill;
    }

    /**
     * @param int $darkThemeDimming
     * @return static
     */
    public function setDarkThemeDimming(int $darkThemeDimming): self
    {
        $this->darkThemeDimming = $darkThemeDimming;

        return $this;
    }

    /**
     * @return int
     */
    public function getDarkThemeDimming(): int
    {
        return $this->darkThemeDimming;
    }

}