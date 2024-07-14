<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputsticker
 *
 * This object describes a sticker to be added to a sticker set. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputSticker extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'sticker',
            'format',
            'emoji_list',
            'mask_position',
            'keywords',
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
            'sticker' => $this->getSticker(),
            'format' => $this->getFormat(),
            'emoji_list' => $this->getEmojiList(),
            'mask_position' => $this->getMaskPosition(),
            'keywords' => $this->getKeywords(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The added sticker. Pass a file_id as a String to send a file that already exists on the Telegram servers, pass an HTTP 
     * URL as a String for Telegram to get a file from the Internet, upload a new one using multipart/form-data, or pass 
     * “attach://” to upload a new one using multipart/form-data under  name. Animated and video stickers can't be 
     * uploaded via HTTP URL. More information on Sending Files » 
     *
     * @var InputFile|string
     * @SerializedName("sticker")
     * @Accessor(getter="getSticker", setter="setSticker")
     * @Type("string")
     */
    protected $sticker;

    /**
     * Format of the added sticker, must be one of “static” for a .WEBP or .PNG image, “animated” for a .TGS 
     * animation, “video” for a WEBM video 
     *
     * @var string
     * @SerializedName("format")
     * @Accessor(getter="getFormat", setter="setFormat")
     * @Type("string")
     */
    protected $format;

    /**
     * List of 1-20 emoji associated with the sticker 
     *
     * @var string[]
     * @SerializedName("emoji_list")
     * @Accessor(getter="getEmojiList", setter="setEmojiList")
     * @Type("array<string>")
     */
    protected $emojiList;

    /**
     * Optional. Position where the mask should be placed on faces. For “mask” stickers only. 
     *
     * @var MaskPosition|null
     * @SkipWhenEmpty
     * @SerializedName("mask_position")
     * @Accessor(getter="getMaskPosition", setter="setMaskPosition")
     * @Type("MadmagesTelegram\Types\Type\MaskPosition")
     */
    protected $maskPosition;

    /**
     * Optional. List of 0-20 search keywords for the sticker with total length of up to 64 characters. For “regular” 
     * and “custom_emoji” stickers only. 
     *
     * @var string[]|null
     * @SkipWhenEmpty
     * @SerializedName("keywords")
     * @Accessor(getter="getKeywords", setter="setKeywords")
     * @Type("array<string>")
     */
    protected $keywords;


    /**
     * @param InputFile|string $sticker
     * @return static
     */
    public function setSticker( $sticker): self
    {
        $this->sticker = $sticker;

        return $this;
    }

    /**
     * @return InputFile|string
     */
    public function getSticker()
    {
        return $this->sticker;
    }

    /**
     * @param string $format
     * @return static
     */
    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @param string[] $emojiList
     * @return static
     */
    public function setEmojiList(array $emojiList): self
    {
        $this->emojiList = $emojiList;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getEmojiList(): array
    {
        return $this->emojiList;
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
     * @param string[] $keywords
     * @return static
     */
    public function setKeywords(array $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getKeywords(): ?array
    {
        return $this->keywords;
    }

}