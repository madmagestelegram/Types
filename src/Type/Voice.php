<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#voice
 *
 * This object represents a voice note. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Voice extends AbstractType
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
            'duration',
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
            'duration' => $this->getDuration(),
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
     * Duration of the audio in seconds as defined by sender
     *
     * @var int
     * @SerializedName("duration")
     * @Accessor(getter="getDuration",setter="setduration")
     * @Type("int")
     */
    protected $duration;

    /**
     * Optional. MIME type of the file as defined by sender
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