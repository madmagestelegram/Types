<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultvideo
 *
 * Represents a link to a page containing an embedded video player or a video file. By default, this video file will be sent 
 * by the user with an optional caption. Alternatively, you can use input_message_content to send a message 
 * with the specified content instead of the video. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultVideo extends AbstractInlineQueryResult
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
            'video_url',
            'mime_type',
            'thumbnail_url',
            'title',
            'caption',
            'parse_mode',
            'caption_entities',
            'show_caption_above_media',
            'video_width',
            'video_height',
            'video_duration',
            'description',
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
            'video_url' => $this->getVideoUrl(),
            'mime_type' => $this->getMimeType(),
            'thumbnail_url' => $this->getThumbnailUrl(),
            'title' => $this->getTitle(),
            'caption' => $this->getCaption(),
            'parse_mode' => $this->getParseMode(),
            'caption_entities' => $this->getCaptionEntities(),
            'show_caption_above_media' => $this->getShowCaptionAboveMedia(),
            'video_width' => $this->getVideoWidth(),
            'video_height' => $this->getVideoHeight(),
            'video_duration' => $this->getVideoDuration(),
            'description' => $this->getDescription(),
            'reply_markup' => $this->getReplyMarkup(),
            'input_message_content' => $this->getInputMessageContent(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the result, must be video 
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
     * A valid URL for the embedded video player or video file 
     *
     * @var string
     * @SerializedName("video_url")
     * @Accessor(getter="getVideoUrl", setter="setVideoUrl")
     * @Type("string")
     */
    protected $videoUrl;

    /**
     * MIME type of the content of the video URL, “text/html” or “video/mp4” 
     *
     * @var string
     * @SerializedName("mime_type")
     * @Accessor(getter="getMimeType", setter="setMimeType")
     * @Type("string")
     */
    protected $mimeType;

    /**
     * URL of the thumbnail (JPEG only) for the video 
     *
     * @var string
     * @SerializedName("thumbnail_url")
     * @Accessor(getter="getThumbnailUrl", setter="setThumbnailUrl")
     * @Type("string")
     */
    protected $thumbnailUrl;

    /**
     * Title for the result 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Caption of the video to be sent, 0-1024 characters after entities parsing 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption", setter="setCaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Mode for parsing entities in the video caption. See formatting options for more details. 
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
     * Optional. Video width 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("video_width")
     * @Accessor(getter="getVideoWidth", setter="setVideoWidth")
     * @Type("int")
     */
    protected $videoWidth;

    /**
     * Optional. Video height 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("video_height")
     * @Accessor(getter="getVideoHeight", setter="setVideoHeight")
     * @Type("int")
     */
    protected $videoHeight;

    /**
     * Optional. Video duration in seconds 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("video_duration")
     * @Accessor(getter="getVideoDuration", setter="setVideoDuration")
     * @Type("int")
     */
    protected $videoDuration;

    /**
     * Optional. Short description of the result 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("description")
     * @Accessor(getter="getDescription", setter="setDescription")
     * @Type("string")
     */
    protected $description;

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
     * Optional. Content of the message to be sent instead of the video. This field is required if InlineQueryResultVideo 
     * is used to send an HTML-page as a result (e.g., a YouTube video). 
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
     * @param string $videoUrl
     * @return static
     */
    public function setVideoUrl(string $videoUrl): self
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }

    /**
     * @param string $mimeType
     * @return static
     */
    public function setMimeType(string $mimeType): self
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
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
     * @param int $videoWidth
     * @return static
     */
    public function setVideoWidth(int $videoWidth): self
    {
        $this->videoWidth = $videoWidth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVideoWidth(): ?int
    {
        return $this->videoWidth;
    }

    /**
     * @param int $videoHeight
     * @return static
     */
    public function setVideoHeight(int $videoHeight): self
    {
        $this->videoHeight = $videoHeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVideoHeight(): ?int
    {
        return $this->videoHeight;
    }

    /**
     * @param int $videoDuration
     * @return static
     */
    public function setVideoDuration(int $videoDuration): self
    {
        $this->videoDuration = $videoDuration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVideoDuration(): ?int
    {
        return $this->videoDuration;
    }

    /**
     * @param string $description
     * @return static
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
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