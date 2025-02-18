<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultgif
 *
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional 
 * caption. Alternatively, you can use input_message_content to send a message with the specified content instead of 
 * the animation. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultGif extends AbstractInlineQueryResult
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
            'gif_url',
            'gif_width',
            'gif_height',
            'gif_duration',
            'thumbnail_url',
            'thumbnail_mime_type',
            'title',
            'caption',
            'parse_mode',
            'caption_entities',
            'show_caption_above_media',
            'reply_markup',
            'input_message_content',
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
            'id' => $this->getId(),
            'gif_url' => $this->getGifUrl(),
            'gif_width' => $this->getGifWidth(),
            'gif_height' => $this->getGifHeight(),
            'gif_duration' => $this->getGifDuration(),
            'thumbnail_url' => $this->getThumbnailUrl(),
            'thumbnail_mime_type' => $this->getThumbnailMimeType(),
            'title' => $this->getTitle(),
            'caption' => $this->getCaption(),
            'parse_mode' => $this->getParseMode(),
            'caption_entities' => $this->getCaptionEntities(),
            'show_caption_above_media' => $this->getShowCaptionAboveMedia(),
            'reply_markup' => $this->getReplyMarkup(),
            'input_message_content' => $this->getInputMessageContent(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the result, must be gif 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 bytes 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId", setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * A valid URL for the GIF file 
     *
     * @var string
     * @SerializedName("gif_url")
     * @Accessor(getter="getGifUrl", setter="setGifUrl")
     * @Type("string")
     */
    protected $gifUrl;

    /**
     * Optional. Width of the GIF 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("gif_width")
     * @Accessor(getter="getGifWidth", setter="setGifWidth")
     * @Type("int")
     */
    protected $gifWidth;

    /**
     * Optional. Height of the GIF 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("gif_height")
     * @Accessor(getter="getGifHeight", setter="setGifHeight")
     * @Type("int")
     */
    protected $gifHeight;

    /**
     * Optional. Duration of the GIF in seconds 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("gif_duration")
     * @Accessor(getter="getGifDuration", setter="setGifDuration")
     * @Type("int")
     */
    protected $gifDuration;

    /**
     * URL of the static (JPEG or GIF) or animated (MPEG4) thumbnail for the result 
     *
     * @var string
     * @SerializedName("thumbnail_url")
     * @Accessor(getter="getThumbnailUrl", setter="setThumbnailUrl")
     * @Type("string")
     */
    protected $thumbnailUrl;

    /**
     * Optional. MIME type of the thumbnail, must be one of “image/jpeg”, “image/gif”, or “video/mp4”. 
     * Defaults to “image/jpeg” 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("thumbnail_mime_type")
     * @Accessor(getter="getThumbnailMimeType", setter="setThumbnailMimeType")
     * @Type("string")
     */
    protected $thumbnailMimeType;

    /**
     * Optional. Title for the result 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Caption of the GIF file to be sent, 0-1024 characters after entities parsing 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption", setter="setCaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Mode for parsing entities in the caption. See formatting options for more details. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode", setter="setParseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("caption_entities")
     * @Accessor(getter="getCaptionEntities", setter="setCaptionEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $captionEntities;

    /**
     * Optional. Pass True, if the caption must be shown above the message media 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("show_caption_above_media")
     * @Accessor(getter="getShowCaptionAboveMedia", setter="setShowCaptionAboveMedia")
     * @Type("bool")
     */
    protected $showCaptionAboveMedia;

    /**
     * Optional. Inline keyboard attached to the message 
     *
     * @var InlineKeyboardMarkup|null
     * @SkipWhenEmpty
     * @SerializedName("reply_markup")
     * @Accessor(getter="getReplyMarkup", setter="setReplyMarkup")
     * @Type("MadmagesTelegram\Types\Type\InlineKeyboardMarkup")
     */
    protected $replyMarkup;

    /**
     * Optional. Content of the message to be sent instead of the GIF animation 
     *
     * @var AbstractInputMessageContent|null
     * @SkipWhenEmpty
     * @SerializedName("input_message_content")
     * @Accessor(getter="getInputMessageContent", setter="setInputMessageContent")
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
     * @param string $gifUrl
     * @return static
     */
    public function setGifUrl(string $gifUrl): self
    {
        $this->gifUrl = $gifUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getGifUrl(): string
    {
        return $this->gifUrl;
    }

    /**
     * @param int $gifWidth
     * @return static
     */
    public function setGifWidth(int $gifWidth): self
    {
        $this->gifWidth = $gifWidth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifWidth(): ?int
    {
        return $this->gifWidth;
    }

    /**
     * @param int $gifHeight
     * @return static
     */
    public function setGifHeight(int $gifHeight): self
    {
        $this->gifHeight = $gifHeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifHeight(): ?int
    {
        return $this->gifHeight;
    }

    /**
     * @param int $gifDuration
     * @return static
     */
    public function setGifDuration(int $gifDuration): self
    {
        $this->gifDuration = $gifDuration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifDuration(): ?int
    {
        return $this->gifDuration;
    }

    /**
     * @param string $thumbnailUrl
     * @return static
     */
    public function setThumbnailUrl(string $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnailUrl(): string
    {
        return $this->thumbnailUrl;
    }

    /**
     * @param string $thumbnailMimeType
     * @return static
     */
    public function setThumbnailMimeType(string $thumbnailMimeType): self
    {
        $this->thumbnailMimeType = $thumbnailMimeType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getThumbnailMimeType(): ?string
    {
        return $this->thumbnailMimeType;
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
     * @param MessageEntity[] $captionEntities
     * @return static
     */
    public function setCaptionEntities(array $captionEntities): self
    {
        $this->captionEntities = $captionEntities;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param bool $showCaptionAboveMedia
     * @return static
     */
    public function setShowCaptionAboveMedia(bool $showCaptionAboveMedia): self
    {
        $this->showCaptionAboveMedia = $showCaptionAboveMedia;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowCaptionAboveMedia(): ?bool
    {
        return $this->showCaptionAboveMedia;
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