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
            'type',
            'width',
            'height',
            'is_animated',
            'is_video',
            'thumb',
            'emoji',
            'set_name',
            'premium_animation',
            'mask_position',
            'custom_emoji_id',
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
            'type' => $this->getType(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'is_animated' => $this->getIsAnimated(),
            'is_video' => $this->getIsVideo(),
            'thumb' => $this->getThumb(),
            'emoji' => $this->getEmoji(),
            'set_name' => $this->getSetName(),
            'premium_animation' => $this->getPremiumAnimation(),
            'mask_position' => $this->getMaskPosition(),
            'custom_emoji_id' => $this->getCustomEmojiId(),
            'file_size' => $this->getFileSize(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Identifier for this file, which can be used to download or reuse the file 
     *
     * @var string
     * @SerializedName("file_id")
     * @Accessor(getter="getFileId", setter="setFileId")
     * @Type("string")
     */
    protected $fileId;

    /**
     * Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to 
     * download or reuse the file. 
     *
     * @var string
     * @SerializedName("file_unique_id")
     * @Accessor(getter="getFileUniqueId", setter="setFileUniqueId")
     * @Type("string")
     */
    protected $fileUniqueId;

    /**
     * Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is 
     * independent from its format, which is determined by the fields is_animated and is_video. 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Sticker width 
     *
     * @var int
     * @SerializedName("width")
     * @Accessor(getter="getWidth", setter="setWidth")
     * @Type("int")
     */
    protected $width;

    /**
     * Sticker height 
     *
     * @var int
     * @SerializedName("height")
     * @Accessor(getter="getHeight", setter="setHeight")
     * @Type("int")
     */
    protected $height;

    /**
     * True, if the sticker is animated 
     *
     * @var bool
     * @SerializedName("is_animated")
     * @Accessor(getter="getIsAnimated", setter="setIsAnimated")
     * @Type("bool")
     */
    protected $isAnimated;

    /**
     * True, if the sticker is a video sticker 
     *
     * @var bool
     * @SerializedName("is_video")
     * @Accessor(getter="getIsVideo", setter="setIsVideo")
     * @Type("bool")
     */
    protected $isVideo;

    /**
     * Optional. Sticker thumbnail in the .WEBP or .JPG format 
     *
     * @var PhotoSize|null
     * @SkipWhenEmpty
     * @SerializedName("thumb")
     * @Accessor(getter="getThumb", setter="setThumb")
     * @Type("MadmagesTelegram\Types\Type\PhotoSize")
     */
    protected $thumb;

    /**
     * Optional. Emoji associated with the sticker 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("emoji")
     * @Accessor(getter="getEmoji", setter="setEmoji")
     * @Type("string")
     */
    protected $emoji;

    /**
     * Optional. Name of the sticker set to which the sticker belongs 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("set_name")
     * @Accessor(getter="getSetName", setter="setSetName")
     * @Type("string")
     */
    protected $setName;

    /**
     * Optional. For premium regular stickers, premium animation for the sticker 
     *
     * @var File|null
     * @SkipWhenEmpty
     * @SerializedName("premium_animation")
     * @Accessor(getter="getPremiumAnimation", setter="setPremiumAnimation")
     * @Type("MadmagesTelegram\Types\Type\File")
     */
    protected $premiumAnimation;

    /**
     * Optional. For mask stickers, the position where the mask should be placed 
     *
     * @var MaskPosition|null
     * @SkipWhenEmpty
     * @SerializedName("mask_position")
     * @Accessor(getter="getMaskPosition", setter="setMaskPosition")
     * @Type("MadmagesTelegram\Types\Type\MaskPosition")
     */
    protected $maskPosition;

    /**
     * Optional. For custom emoji stickers, unique identifier of the custom emoji 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("custom_emoji_id")
     * @Accessor(getter="getCustomEmojiId", setter="setCustomEmojiId")
     * @Type("string")
     */
    protected $customEmojiId;

    /**
     * Optional. File size in bytes 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("file_size")
     * @Accessor(getter="getFileSize", setter="setFileSize")
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
     * @param File $premiumAnimation
     * @return static
     */
    public function setPremiumAnimation(File $premiumAnimation): self
    {
        $this->premiumAnimation = $premiumAnimation;

        return $this;
    }

    /**
     * @return File|null
     */
    public function getPremiumAnimation(): ?File
    {
        return $this->premiumAnimation;
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
     * @param string $customEmojiId
     * @return static
     */
    public function setCustomEmojiId(string $customEmojiId): self
    {
        $this->customEmojiId = $customEmojiId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomEmojiId(): ?string
    {
        return $this->customEmojiId;
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