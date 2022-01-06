<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#animation
 *
 * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound). 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Animation extends AbstractType
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
            'thumb',
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
            'thumb' => $this->getThumb(),
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
     * Video width as defined by sender 
     *
     * @var int
     * @SerializedName("width")
     * @Accessor(getter="getWidth",setter="setWidth")
     * @Type("int")
     */
    protected $width;

    /**
     * Video height as defined by sender 
     *
     * @var int
     * @SerializedName("height")
     * @Accessor(getter="getHeight",setter="setHeight")
     * @Type("int")
     */
    protected $height;

    /**
     * Duration of the video in seconds as defined by sender 
     *
     * @var int
     * @SerializedName("duration")
     * @Accessor(getter="getDuration",setter="setDuration")
     * @Type("int")
     */
    protected $duration;

    /**
     * Optional. Animation thumbnail as defined by sender 
     *
     * @var PhotoSize|null
     * @SkipWhenEmpty
     * @SerializedName("thumb")
     * @Accessor(getter="getThumb",setter="setThumb")
     * @Type("MadmagesTelegram\Types\Type\PhotoSize")
     */
    protected $thumb;

    /**
     * Optional. Original animation filename as defined by sender 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("file_name")
     * @Accessor(getter="getFileName",setter="setFileName")
     * @Type("string")
     */
    protected $fileName;

    /**
     * Optional. MIME type of the file as defined by sender 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("mime_type")
     * @Accessor(getter="getMimeType",setter="setMimeType")
     * @Type("string")
     */
    protected $mimeType;

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