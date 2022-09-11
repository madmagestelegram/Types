<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#passportfile
 *
 * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG 
 * format when decrypted and don't exceed 10MB. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PassportFile extends AbstractType
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
            'file_size',
            'file_date',
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
            'file_size' => $this->getFileSize(),
            'file_date' => $this->getFileDate(),
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
     * File size in bytes 
     *
     * @var int
     * @SerializedName("file_size")
     * @Accessor(getter="getFileSize", setter="setFileSize")
     * @Type("int")
     */
    protected $fileSize;

    /**
     * Unix time when the file was uploaded 
     *
     * @var int
     * @SerializedName("file_date")
     * @Accessor(getter="getFileDate", setter="setFileDate")
     * @Type("int")
     */
    protected $fileDate;


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
     * @param int $fileSize
     * @return static
     */
    public function setFileSize(int $fileSize): self
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * @return int
     */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }

    /**
     * @param int $fileDate
     * @return static
     */
    public function setFileDate(int $fileDate): self
    {
        $this->fileDate = $fileDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getFileDate(): int
    {
        return $this->fileDate;
    }

}