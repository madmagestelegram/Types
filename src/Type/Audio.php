<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#audio
 *
 * This object represents an audio file to be treated as music by the Telegram clients. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Audio extends AbstractType
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
            'duration',
            'performer',
            'title',
            'file_name',
            'mime_type',
            'file_size',
            'thumbnail',
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
            'duration' => $this->getDuration(),
            'performer' => $this->getPerformer(),
            'title' => $this->getTitle(),
            'file_name' => $this->getFileName(),
            'mime_type' => $this->getMimeType(),
            'file_size' => $this->getFileSize(),
            'thumbnail' => $this->getThumbnail(),
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
     * Duration of the audio in seconds as defined by sender 
     *
     * @var int
     * @SerializedName("duration")
     * @Accessor(getter="getDuration", setter="setDuration")
     * @Type("int")
     */
    protected $duration;

    /**
     * Optional. Performer of the audio as defined by sender or by audio tags 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("performer")
     * @Accessor(getter="getPerformer", setter="setPerformer")
     * @Type("string")
     */
    protected $performer;

    /**
     * Optional. Title of the audio as defined by sender or by audio tags 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Original filename as defined by sender 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("file_name")
     * @Accessor(getter="getFileName", setter="setFileName")
     * @Type("string")
     */
    protected $fileName;

    /**
     * Optional. MIME type of the file as defined by sender 
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
     * Optional. Thumbnail of the album cover to which the music file belongs 
     *
     * @var PhotoSize|null
     * @SkipWhenEmpty
     * @SerializedName("thumbnail")
     * @Accessor(getter="getThumbnail", setter="setThumbnail")
     * @Type("MadmagesTelegram\Types\Type\PhotoSize")
     */
    protected $thumbnail;


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
     * @param string $performer
     * @return static
     */
    public function setPerformer(string $performer): self
    {
        $this->performer = $performer;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPerformer(): ?string
    {
        return $this->performer;
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

}