<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#sticker
 *
 * This object represents a sticker. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Sticker extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'file_id',
            'file_unique_id',
            'width',
            'height',
            'is_animated',
            'thumb',
            'emoji',
            'set_name',
            'mask_position',
            'file_size',
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
            'file_id' => $this->getFileId(),
            'file_unique_id' => $this->getFileUniqueId(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'is_animated' => $this->getIsAnimated(),
            'thumb' => $this->getThumb(),
            'emoji' => $this->getEmoji(),
            'set_name' => $this->getSetName(),
            'mask_position' => $this->getMaskPosition(),
            'file_size' => $this->getFileSize(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Identifier for this file, which can be used to download or reuse the file 
     *
     * @var string
     * @SerializedName("file_id")
     * @Accessor(getter="getFileId",setter="setFileId")
     * @Type("string")
     */
    protected $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to 
     * download or reuse the file. 
     *
     * @var string
     * @SerializedName("file_unique_id")
     * @Accessor(getter="getFileUniqueId",setter="setFileUniqueId")
     * @Type("string")
     */
    protected $fileUniqueId;

    /**
     * Sticker width 
     *
     * @var int
     * @SerializedName("width")
     * @Accessor(getter="getWidth",setter="setWidth")
     * @Type("int")
     */
    protected $width;

    /**
     * Sticker height 
     *
     * @var int
     * @SerializedName("height")
     * @Accessor(getter="getHeight",setter="setHeight")
     * @Type("int")
     */
    protected $height;

    /**
     * True, if the sticker is animated 
     *
     * @var bool
     * @SerializedName("is_animated")
     * @Accessor(getter="getIsAnimated",setter="setIsAnimated")
     * @Type("bool")
     */
    protected $isAnimated;

    /**
     * Optional. Sticker thumbnail in the .WEBP or .JPG format 
     *
     * @var PhotoSize|null
     * @SkipWhenEmpty
     * @SerializedName("thumb")
     * @Accessor(getter="getThumb",setter="setThumb")
     * @Type("MadmagesTelegram\Types\Type\PhotoSize")
     */
    protected $thumb;

    /**
     * Optional. Emoji associated with the sticker 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("emoji")
     * @Accessor(getter="getEmoji",setter="setEmoji")
     * @Type("string")
     */
    protected $emoji;

    /**
     * Optional. Name of the sticker set to which the sticker belongs 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("set_name")
     * @Accessor(getter="getSetName",setter="setSetName")
     * @Type("string")
     */
    protected $setName;

    /**
     * Optional. For mask stickers, the position where the mask should be placed 
     *
     * @var MaskPosition|null
     * @SkipWhenEmpty
     * @SerializedName("mask_position")
     * @Accessor(getter="getMaskPosition",setter="setMaskPosition")
     * @Type("MadmagesTelegram\Types\Type\MaskPosition")
     */
    protected $maskPosition;

    /**
     * Optional. File size in bytes 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("file_size")
     * @Accessor(getter="getFileSize",setter="setFileSize")
     * @Type("int")
     */
    protected $fileSize;


    /**
     * @param string $fileId
     * @return static
     */
    public function setFileId(string $fileId): self
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileId(): string
    {
        return $this->fileId;
    }

    /**
     * @param string $fileUniqueId
     * @return static
     */
    public function setFileUniqueId(string $fileUniqueId): self
    {
        $this->fileUniqueId = $fileUniqueId;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileUniqueId(): string
    {
        return $this->fileUniqueId;
    }

    /**
     * @param int $width
     * @return static
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $height
     * @return static
     */
    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
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

    /**
     * @param string $emoji
     * @return static
     */
    public function setEmoji(string $emoji): self
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmoji(): ?string
    {
        return $this->emoji;
    }

    /**
     * @param string $setName
     * @return static
     */
    public function setSetName(string $setName): self
    {
        $this->setName = $setName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSetName(): ?string
    {
        return $this->setName;
    }

    /**
     * @param MaskPosition $maskPosition
     * @return static
     */
    public function setMaskPosition(MaskPosition $maskPosition): self
    {
        $this->maskPosition = $maskPosition;

        return $this;
    }

    /**
     * @return MaskPosition|null
     */
    public function getMaskPosition(): ?MaskPosition
    {
        return $this->maskPosition;
    }

    /**
     * @param int $fileSize
     * @return static
     */
    public function setFileSize(int $fileSize): self
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

}