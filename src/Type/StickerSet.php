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
            'is_animated',
            'contains_masks',
            'stickers',
            'thumb',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getRawData(): array
    {
        $result = [
            'name' => $this->getName(),
            'title' => $this->getTitle(),
            'is_animated' => $this->getIsAnimated(),
            'contains_masks' => $this->getContainsMasks(),
            'stickers' => $this->getStickers(),
            'thumb' => $this->getThumb(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
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
     * True, if the sticker set contains animated stickers 
     *
     * @var bool
     * @SerializedName("is_animated")
     * @Accessor(getter="getIsAnimated",setter="setIsAnimated")
     * @Type("bool")
     */
    protected $isAnimated;

    /**
     * True, if the sticker set contains masks 
     *
     * @var bool
     * @SerializedName("contains_masks")
     * @Accessor(getter="getContainsMasks",setter="setContainsMasks")
     * @Type("bool")
     */
    protected $containsMasks;

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
     * Optional. Sticker set thumbnail in the .WEBP or .TGS format 
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
     * @param bool $containsMasks
     * @return static
     */
    public function setContainsMasks(bool $containsMasks): self
    {
        $this->containsMasks = $containsMasks;

        return $this;
    }

    /**
     * @return bool
     */
    public function getContainsMasks(): bool
    {
        return $this->containsMasks;
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