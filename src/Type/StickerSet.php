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
            'contains_masks',
            'stickers',
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
            'contains_masks' => $this->getContainsMasks(),
            'stickers' => $this->getStickers(),
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
     * @Accessor(getter="getName",setter="setname")
     * @Type("string")
     */
    protected $name;

    /**
     * Sticker set title
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="settitle")
     * @Type("string")
     */
    protected $title;

    /**
     * True, if the sticker set contains masks
     *
     * @var bool
     * @SerializedName("contains_masks")
     * @Accessor(getter="getContainsMasks",setter="setcontainsMasks")
     * @Type("bool")
     */
    protected $containsMasks;

    /**
     * List of all set stickers
     *
     * @var Sticker[]
     * @SerializedName("stickers")
     * @Accessor(getter="getStickers",setter="setstickers")
     * @Type("array<MadmagesTelegram\Types\Type\Sticker>")
     */
    protected $stickers;


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

}