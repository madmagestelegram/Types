<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputpaidmediavideo
 *
 * The paid media to send is a video. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputPaidMediaVideo extends AbstractInputPaidMedia
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
            'width',
            'height',
            'duration',
            'supports_streaming',
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
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'duration' => $this->getDuration(),
            'supports_streaming' => $this->getSupportsStreaming(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the media, must be video 
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
     * @var InputFile|string|null
     * @SkipWhenEmpty
     * @SerializedName("thumbnail")
     * @Accessor(getter="getThumbnail", setter="setThumbnail")
     * @Type("string")
     */
    protected $thumbnail;

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
     * @param InputFile|string $thumbnail
     * @return static
     */
    public function setThumbnail( $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return InputFile|string|null
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
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

}