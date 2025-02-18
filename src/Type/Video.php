<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#video
 *
 * This object represents a video file. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Video extends AbstractType
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
            'duration',
            'thumbnail',
            'cover',
            'start_timestamp',
            'file_name',
            'mime_type',
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
            'duration' => $this->getDuration(),
            'thumbnail' => $this->getThumbnail(),
            'cover' => $this->getCover(),
            'start_timestamp' => $this->getStartTimestamp(),
            'file_name' => $this->getFileName(),
            'mime_type' => $this->getMimeType(),
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
     * Video width as defined by the sender 
     *
     * @var int
     * @SerializedName("width")
     * @Accessor(getter="getWidth", setter="setWidth")
     * @Type("int")
     */
    protected $width;

    /**
     * Video height as defined by the sender 
     *
     * @var int
     * @SerializedName("height")
     * @Accessor(getter="getHeight", setter="setHeight")
     * @Type("int")
     */
    protected $height;

    /**
     * Duration of the video in seconds as defined by the sender 
     *
     * @var int
     * @SerializedName("duration")
     * @Accessor(getter="getDuration", setter="setDuration")
     * @Type("int")
     */
    protected $duration;

    /**
     * Optional. Video thumbnail 
     *
     * @var PhotoSize|null
     * @SkipWhenEmpty
     * @SerializedName("thumbnail")
     * @Accessor(getter="getThumbnail", setter="setThumbnail")
     * @Type("MadmagesTelegram\Types\Type\PhotoSize")
     */
    protected $thumbnail;

    /**
     * Optional. Available sizes of the cover of the video in the message 
     *
     * @var PhotoSize[]|null
     * @SkipWhenEmpty
     * @SerializedName("cover")
     * @Accessor(getter="getCover", setter="setCover")
     * @Type("array<MadmagesTelegram\Types\Type\PhotoSize>")
     */
    protected $cover;

    /**
     * Optional. Timestamp in seconds from which the video will play in the message 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("start_timestamp")
     * @Accessor(getter="getStartTimestamp", setter="setStartTimestamp")
     * @Type("int")
     */
    protected $startTimestamp;

    /**
     * Optional. Original filename as defined by the sender 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("file_name")
     * @Accessor(getter="getFileName", setter="setFileName")
     * @Type("string")
     */
    protected $fileName;

    /**
     * Optional. MIME type of the file as defined by the sender 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("mime_type")
     * @Accessor(getter="getMimeType", setter="setMimeType")
     * @Type("string")
     */
    protected $mimeType;

    /**
     * Optional. File size in bytes. It can be bigger than 2^31 and some programming languages may have difficulty/silent 
     * defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type 
     * are safe for storing this value. 
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
     * @param int $duration
     * @return static
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param PhotoSize $thumbnail
     * @return static
     */
    public function setThumbnail(PhotoSize $thumbnail): self
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return PhotoSize|null
     */
    public function getThumbnail(): ?PhotoSize
    {
        return $this->thumbnail;
    }

    /**
     * @param PhotoSize[] $cover
     * @return static
     */
    public function setCover(array $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getCover(): ?array
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
     * @param string $fileName
     * @return static
     */
    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
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
     * @return string|null
     */
    public function getMimeType(): ?string
    {
        return $this->mimeType;
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