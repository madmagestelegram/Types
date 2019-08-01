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
            'width',
            'height',
            'duration',
            'thumb',
            'mime_type',
            'file_size',
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
            'file_id' => $this->getFileId(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'duration' => $this->getDuration(),
            'thumb' => $this->getThumb(),
            'mime_type' => $this->getMimeType(),
            'file_size' => $this->getFileSize(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Unique identifier for this file
     *
     * @var string
     * @SerializedName("file_id")
     * @Accessor(getter="getFileId",setter="setfileId")
     * @Type("string")
     */
    protected $fileId;

    /**
     * Video width as defined by sender
     *
     * @var int
     * @SerializedName("width")
     * @Accessor(getter="getWidth",setter="setwidth")
     * @Type("int")
     */
    protected $width;

    /**
     * Video height as defined by sender
     *
     * @var int
     * @SerializedName("height")
     * @Accessor(getter="getHeight",setter="setheight")
     * @Type("int")
     */
    protected $height;

    /**
     * Duration of the video in seconds as defined by sender
     *
     * @var int
     * @SerializedName("duration")
     * @Accessor(getter="getDuration",setter="setduration")
     * @Type("int")
     */
    protected $duration;

    /**
     * Optional. Video thumbnail
     *
     * @var PhotoSize|null
     * @SkipWhenEmpty
     * @SerializedName("thumb")
     * @Accessor(getter="getThumb",setter="setthumb")
     * @Type("MadmagesTelegram\Types\Type\PhotoSize")
     */
    protected $thumb;

    /**
     * Optional. Mime type of a file as defined by sender
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("mime_type")
     * @Accessor(getter="getMimeType",setter="setmimeType")
     * @Type("string")
     */
    protected $mimeType;

    /**
     * Optional. File size
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("file_size")
     * @Accessor(getter="getFileSize",setter="setfileSize")
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