<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputmediavideo
 *
 * Represents a video to be sent. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputMediaVideo extends AbstractInputMedia
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
            'media',
            'thumbnail',
            'cover',
            'start_timestamp',
            'caption',
            'parse_mode',
            'caption_entities',
            'show_caption_above_media',
            'width',
            'height',
            'duration',
            'supports_streaming',
            'has_spoiler',
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
            'media' => $this->getMedia(),
            'thumbnail' => $this->getThumbnail(),
            'cover' => $this->getCover(),
            'start_timestamp' => $this->getStartTimestamp(),
            'caption' => $this->getCaption(),
            'parse_mode' => $this->getParseMode(),
            'caption_entities' => $this->getCaptionEntities(),
            'show_caption_above_media' => $this->getShowCaptionAboveMedia(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'duration' => $this->getDuration(),
            'supports_streaming' => $this->getSupportsStreaming(),
            'has_spoiler' => $this->getHasSpoiler(),
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
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for 
     * Telegram to get a file from the Internet, or pass “attach://” to upload a new one using 
     * multipart/form-data under  name. More information on Sending Files » 
     *
     * @var string
     * @SerializedName("media")
     * @Accessor(getter="getMedia", setter="setMedia")
     * @Type("string")
     */
    protected $media;

    /**
     * Optional. Thumbnail of the file sent; can be ignored if thumbnail generation for the file is supported server-side. 
     * The thumbnail should be in JPEG format and less than 200 kB in size. A thumbnail's width and height should not exceed 320. 
     * Ignored if the file is not uploaded using multipart/form-data. Thumbnails can't be reused and can be only uploaded as a new 
     * file, so you can pass “attach://” if the thumbnail was uploaded using multipart/form-data 
     * under . More information on Sending Files » 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("thumbnail")
     * @Accessor(getter="getThumbnail", setter="setThumbnail")
     * @Type("string")
     */
    protected $thumbnail;

    /**
     * Optional. Cover for the video in the message. Pass a file_id to send a file that exists on the Telegram servers 
     * (recommended), pass an HTTP URL for Telegram to get a file from the Internet, or pass “attach://” to upload a 
     * new one using multipart/form-data under  name. More information on Sending Files » 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("cover")
     * @Accessor(getter="getCover", setter="setCover")
     * @Type("string")
     */
    protected $cover;

    /**
     * Optional. Start timestamp for the video in the message 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("start_timestamp")
     * @Accessor(getter="getStartTimestamp", setter="setStartTimestamp")
     * @Type("int")
     */
    protected $startTimestamp;

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
     * @SerializedName("width")
     * @Accessor(getter="getWidth", setter="setWidth")
     * @Type("int")
     */
    protected $width;

    /**
     * Optional. Video height 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("height")
     * @Accessor(getter="getHeight", setter="setHeight")
     * @Type("int")
     */
    protected $height;

    /**
     * Optional. Video duration in seconds 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("duration")
     * @Accessor(getter="getDuration", setter="setDuration")
     * @Type("int")
     */
    protected $duration;

    /**
     * Optional. Pass True if the uploaded video is suitable for streaming 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("supports_streaming")
     * @Accessor(getter="getSupportsStreaming", setter="setSupportsStreaming")
     * @Type("bool")
     */
    protected $supportsStreaming;

    /**
     * Optional. Pass True if the video needs to be covered with a spoiler animation 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_spoiler")
     * @Accessor(getter="getHasSpoiler", setter="setHasSpoiler")
     * @Type("bool")
     */
    protected $hasSpoiler;


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
     * @param string $media
     * @return static
     */
    public function setMedia(string $media): self
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return string
     */
    public function getMedia(): string
    {
        return $this->media;
    }

    /**
     * @param string $thumbnail
     * @return static
     */
    public function setThumbnail(string $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    /**
     * @param string $cover
     * @return static
     */
    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCover(): ?string
    {
        return $this->cover;
    }

    /**
     * @param int $startTimestamp
     * @return static
     */
    public function setStartTimestamp(int $startTimestamp): self
    {
        $this->startTimestamp = $startTimestamp;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStartTimestamp(): ?int
    {
        return $this->startTimestamp;
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
     * @param int $width
     * @return static
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
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
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int $duration
     * @return static
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @param bool $supportsStreaming
     * @return static
     */
    public function setSupportsStreaming(bool $supportsStreaming): self
    {
        $this->supportsStreaming = $supportsStreaming;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSupportsStreaming(): ?bool
    {
        return $this->supportsStreaming;
    }

    /**
     * @param bool $hasSpoiler
     * @return static
     */
    public function setHasSpoiler(bool $hasSpoiler): self
    {
        $this->hasSpoiler = $hasSpoiler;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasSpoiler(): ?bool
    {
        return $this->hasSpoiler;
    }

}