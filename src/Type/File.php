<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#file
 *
 * This object represents a file ready to be downloaded. The file can be downloaded via the link 
 * https://api.telegram.org/file/bot&lt;token&gt;/&lt;file_path&gt;. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by 
 * calling getFile. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class File extends AbstractType
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
            'file_path',
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
            'file_path' => $this->getFilePath(),
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
     * Optional. File path. Use https://api.telegram.org/file/bot/ to get the file. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("file_path")
     * @Accessor(getter="getFilePath", setter="setFilePath")
     * @Type("string")
     */
    protected $filePath;


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
     * @return int|null
     */
    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    /**
     * @param string $filePath
     * @return static
     */
    public function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

}