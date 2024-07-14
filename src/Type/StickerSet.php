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
            'stickers',
            'thumbnail',
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
            'stickers' => $this->getStickers(),
            'thumbnail' => $this->getThumbnail(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Sticker set name 
     *
     * @var string
     * @SerializedName("name")
     * @Accessor(getter="getName", setter="setName")
     * @Type("string")
     */
    protected $name;

    /**
     * Sticker set title 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Type of stickers in the set, currently one of “regular”, “mask”, “custom_emoji” 
     *
     * @var string
     * @SerializedName("sticker_type")
     * @Accessor(getter="getStickerType", setter="setStickerType")
     * @Type("string")
     */
    protected $stickerType;

    /**
     * List of all set stickers 
     *
     * @var Sticker[]
     * @SerializedName("stickers")
     * @Accessor(getter="getStickers", setter="setStickers")
     * @Type("array<MadmagesTelegram\Types\Type\Sticker>")
     */
    protected $stickers;

    /**
     * Optional. Sticker set thumbnail in the .WEBP, .TGS, or .WEBM format 
     *
     * @var PhotoSize|null
     * @SkipWhenEmpty
     * @SerializedName("thumbnail")
     * @Accessor(getter="getThumbnail", setter="setThumbnail")
     * @Type("MadmagesTelegram\Types\Type\PhotoSize")
     */
    protected $thumbnail;


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
     * @param PhotoSize $thumbnail
     * @return static
     */
    public function setThumbnail(PhotoSize $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

}