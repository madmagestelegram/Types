<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif
 *
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound). By default, this animated MPEG-4 file 
 * will be sent by the user with optional caption. Alternatively, you can use input_message_content to send a 
 * message with the specified content instead of the animation. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultMpeg4Gif extends AbstractInlineQueryResult
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
            'id',
            'mpeg4_url',
            'mpeg4_width',
            'mpeg4_height',
            'mpeg4_duration',
            'thumb_url',
            'title',
            'caption',
            'parse_mode',
            'reply_markup',
            'input_message_content',
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
            'type' => $this->getType(),
            'id' => $this->getId(),
            'mpeg4_url' => $this->getMpeg4Url(),
            'mpeg4_width' => $this->getMpeg4Width(),
            'mpeg4_height' => $this->getMpeg4Height(),
            'mpeg4_duration' => $this->getMpeg4Duration(),
            'thumb_url' => $this->getThumbUrl(),
            'title' => $this->getTitle(),
            'caption' => $this->getCaption(),
            'parse_mode' => $this->getParseMode(),
            'reply_markup' => $this->getReplyMarkup(),
            'input_message_content' => $this->getInputMessageContent(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Type of the result, must be mpeg4_gif
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="settype")
     * @Type("string")
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setid")
     * @Type("string")
     */
    protected $id;

    /**
     * A valid URL for the MP4 file. File size must not exceed 1MB
     *
     * @var string
     * @SerializedName("mpeg4_url")
     * @Accessor(getter="getMpeg4Url",setter="setmpeg4Url")
     * @Type("string")
     */
    protected $mpeg4Url;

    /**
     * Optional. Video width
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("mpeg4_width")
     * @Accessor(getter="getMpeg4Width",setter="setmpeg4Width")
     * @Type("int")
     */
    protected $mpeg4Width;

    /**
     * Optional. Video height
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("mpeg4_height")
     * @Accessor(getter="getMpeg4Height",setter="setmpeg4Height")
     * @Type("int")
     */
    protected $mpeg4Height;

    /**
     * Optional. Video duration
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("mpeg4_duration")
     * @Accessor(getter="getMpeg4Duration",setter="setmpeg4Duration")
     * @Type("int")
     */
    protected $mpeg4Duration;

    /**
     * URL of the static thumbnail (jpeg or gif) for the result
     *
     * @var string
     * @SerializedName("thumb_url")
     * @Accessor(getter="getThumbUrl",setter="setthumbUrl")
     * @Type("string")
     */
    protected $thumbUrl;

    /**
     * Optional. Title for the result
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="settitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption",setter="setcaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode",setter="setparseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     * @SkipWhenEmpty
     * @SerializedName("reply_markup")
     * @Accessor(getter="getReplyMarkup",setter="setreplyMarkup")
     * @Type("MadmagesTelegram\Types\Type\InlineKeyboardMarkup")
     */
    protected $replyMarkup;

    /**
     * Optional. Content of the message to be sent instead of the video animation
     *
     * @var AbstractInputMessageContent|null
     * @SkipWhenEmpty
     * @SerializedName("input_message_content")
     * @Accessor(getter="getInputMessageContent",setter="setinputMessageContent")
     * @Type("MadmagesTelegram\Types\Type\AbstractInputMessageContent")
     */
    protected $inputMessageContent;


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
     * @param string $id
     * @return static
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $mpeg4Url
     * @return static
     */
    public function setMpeg4Url(string $mpeg4Url): self
    {
        $this->mpeg4Url = $mpeg4Url;

        return $this;
    }

    /**
     * @return string
     */
    public function getMpeg4Url(): string
    {
        return $this->mpeg4Url;
    }

    /**
     * @param int $mpeg4Width
     * @return static
     */
    public function setMpeg4Width(int $mpeg4Width): self
    {
        $this->mpeg4Width = $mpeg4Width;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Width(): ?int
    {
        return $this->mpeg4Width;
    }

    /**
     * @param int $mpeg4Height
     * @return static
     */
    public function setMpeg4Height(int $mpeg4Height): self
    {
        $this->mpeg4Height = $mpeg4Height;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Height(): ?int
    {
        return $this->mpeg4Height;
    }

    /**
     * @param int $mpeg4Duration
     * @return static
     */
    public function setMpeg4Duration(int $mpeg4Duration): self
    {
        $this->mpeg4Duration = $mpeg4Duration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMpeg4Duration(): ?int
    {
        return $this->mpeg4Duration;
    }

    /**
     * @param string $thumbUrl
     * @return static
     */
    public function setThumbUrl(string $thumbUrl): self
    {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
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
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $caption
     * @return static
     */
    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param string $parseMode
     * @return static
     */
    public function setParseMode(string $parseMode): self
    {
        $this->parseMode = $parseMode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param InlineKeyboardMarkup $replyMarkup
     * @return static
     */
    public function setReplyMarkup(InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;

        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

    /**
     * @param AbstractInputMessageContent $inputMessageContent
     * @return static
     */
    public function setInputMessageContent(AbstractInputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;

        return $this;
    }

    /**
     * @return AbstractInputMessageContent|null
     */
    public function getInputMessageContent(): ?AbstractInputMessageContent
    {
        return $this->inputMessageContent;
    }

}