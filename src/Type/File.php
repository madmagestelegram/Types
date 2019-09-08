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
            'file_size',
            'file_path',
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
            'file_size' => $this->getFileSize(),
            'file_path' => $this->getFilePath(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Identifier for this file
     *
     * @var string
     * @SerializedName("file_id")
     * @Accessor(getter="getFileId",setter="setfileId")
     * @Type("string")
     */
    protected $fileId;

    /**
     * Optional. File size, if known
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("file_size")
     * @Accessor(getter="getFileSize",setter="setfileSize")
     * @Type("int")
     */
    protected $fileSize;

    /**
     * Optional. File path. Use https://api.telegram.org/file/bot/ to get the file.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("file_path")
     * @Accessor(getter="getFilePath",setter="setfilePath")
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