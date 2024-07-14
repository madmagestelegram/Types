<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#backgroundtypewallpaper
 *
 * The background is a wallpaper in the JPEG format. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BackgroundTypeWallpaper extends AbstractBackgroundType
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
            'document',
            'dark_theme_dimming',
            'is_blurred',
            'is_moving',
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
            'document' => $this->getDocument(),
            'dark_theme_dimming' => $this->getDarkThemeDimming(),
            'is_blurred' => $this->getIsBlurred(),
            'is_moving' => $this->getIsMoving(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the background, always “wallpaper” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Document with the wallpaper 
     *
     * @var Document
     * @SerializedName("document")
     * @Accessor(getter="getDocument", setter="setDocument")
     * @Type("MadmagesTelegram\Types\Type\Document")
     */
    protected $document;

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
     * Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_blurred")
     * @Accessor(getter="getIsBlurred", setter="setIsBlurred")
     * @Type("bool")
     */
    protected $isBlurred;

    /**
     * Optional. True, if the background moves slightly when the device is tilted 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_moving")
     * @Accessor(getter="getIsMoving", setter="setIsMoving")
     * @Type("bool")
     */
    protected $isMoving;


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
     * @param Document $document
     * @return static
     */
    public function setDocument(Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
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

    /**
     * @param bool $isBlurred
     * @return static
     */
    public function setIsBlurred(bool $isBlurred): self
    {
        $this->isBlurred = $isBlurred;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsBlurred(): ?bool
    {
        return $this->isBlurred;
    }

    /**
     * @param bool $isMoving
     * @return static
     */
    public function setIsMoving(bool $isMoving): self
    {
        $this->isMoving = $isMoving;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMoving(): ?bool
    {
        return $this->isMoving;
    }

}