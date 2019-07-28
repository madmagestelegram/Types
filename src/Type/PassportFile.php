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
     * Unique identifier for this file
     *
     * @var string
     * @SerializedName("file_id")
     * @Accessor(getter="getFileId",setter="setfileId")
     * @Type("string")
     */
    protected $fileId;

    /**
     * File size
     *
     * @var int
     * @SerializedName("file_size")
     * @Accessor(getter="getFileSize",setter="setfileSize")
     * @Type("int")
     */
    protected $fileSize;

    /**
     * Unix time when the file was uploaded
     *
     * @var int
     * @SerializedName("file_date")
     * @Accessor(getter="getFileDate",setter="setfileDate")
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