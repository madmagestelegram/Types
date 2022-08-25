<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#stickerset
 *
 * This object represents a sticker set. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class StickerSet extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'name',
            'title',
            'sticker_type',
            'is_animated',
            'is_video',
            'stickers',
            'thumb',
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
            'name' => $this->getName(),
            'title' => $this->getTitle(),
            'sticker_type' => $this->getStickerType(),
            'is_animated' => $this->getIsAnimated(),
            'is_video' => $this->getIsVideo(),
            'stickers' => $this->getStickers(),
            'thumb' => $this->getThumb(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Sticker set name 
     *
     * @var string
     * @SerializedName("name")
     * @Accessor(getter="getName",setter="setName")
     * @Type("string")
     */
    protected $name;

    /**
     * Sticker set title 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji” 
     *
     * @var string
     * @SerializedName("sticker_type")
     * @Accessor(getter="getStickerType",setter="setStickerType")
     * @Type("string")
     */
    protected $stickerType;

    /**
     * True, if the sticker set contains animated stickers 
     *
     * @var bool
     * @SerializedName("is_animated")
     * @Accessor(getter="getIsAnimated",setter="setIsAnimated")
     * @Type("bool")
     */
    protected $isAnimated;

    /**
     * True, if the sticker set contains video stickers 
     *
     * @var bool
     * @SerializedName("is_video")
     * @Accessor(getter="getIsVideo",setter="setIsVideo")
     * @Type("bool")
     */
    protected $isVideo;

    /**
     * List of all set stickers 
     *
     * @var Sticker[]
     * @SerializedName("stickers")
     * @Accessor(getter="getStickers",setter="setStickers")
     * @Type("array<MadmagesTelegram\Types\Type\Sticker>")
     */
    protected $stickers;

    /**
     * Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format 
     *
     * @var PhotoSize|null
     * @SkipWhenEmpty
     * @SerializedName("thumb")
     * @Accessor(getter="getThumb",setter="setThumb")
     * @Type("MadmagesTelegram\Types\Type\PhotoSize")
     */
    protected $thumb;


    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $stickerType
     * @return static
     */
    public function setStickerType(string $stickerType): self
    {
        $this->stickerType = $stickerType;

        return $this;
    }

    /**
     * @return string
     */
    public function getStickerType(): string
    {
        return $this->stickerType;
    }

    /**
     * @param bool $isAnimated
     * @return static
     */
    public function setIsAnimated(bool $isAnimated): self
    {
        $this->isAnimated = $isAnimated;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAnimated(): bool
    {
        return $this->isAnimated;
    }

    /**
     * @param bool $isVideo
     * @return static
     */
    public function setIsVideo(bool $isVideo): self
    {
        $this->isVideo = $isVideo;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsVideo(): bool
    {
        return $this->isVideo;
    }

    /**
     * @param Sticker[] $stickers
     * @return static
     */
    public function setStickers(array $stickers): self
    {
        $this->stickers = $stickers;

        return $this;
    }

    /**
     * @return Sticker[]
     */
    public function getStickers(): array
    {
        return $this->stickers;
    }

    /**
     * @param PhotoSize $thumb
     * @return static
     */
    public function setThumb(PhotoSize $thumb): self
    {
        $this->thumb = $thumb;

        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumb(): ?PhotoSize
    {
        return $this->thumb;
    }

}