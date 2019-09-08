<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatphoto
 *
 * This object represents a chat photo. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatPhoto extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'small_file_id',
            'big_file_id',
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
            'small_file_id' => $this->getSmallFileId(),
            'big_file_id' => $this->getBigFileId(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * File identifier of small (160x160) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
     *
     * @var string
     * @SerializedName("small_file_id")
     * @Accessor(getter="getSmallFileId",setter="setsmallFileId")
     * @Type("string")
     */
    protected $smallFileId;

    /**
     * File identifier of big (640x640) chat photo. This file_id can be used only for photo download and only for as long as the photo is not changed.
     *
     * @var string
     * @SerializedName("big_file_id")
     * @Accessor(getter="getBigFileId",setter="setbigFileId")
     * @Type("string")
     */
    protected $bigFileId;


    /**
     * @param string $smallFileId
     * @return static
     */
    public function setSmallFileId(string $smallFileId): self
    {
        $this->smallFileId = $smallFileId;

        return $this;
    }

    /**
     * @return string
     */
    public function getSmallFileId(): string
    {
        return $this->smallFileId;
    }

    /**
     * @param string $bigFileId
     * @return static
     */
    public function setBigFileId(string $bigFileId): self
    {
        $this->bigFileId = $bigFileId;

        return $this;
    }

    /**
     * @return string
     */
    public function getBigFileId(): string
    {
        return $this->bigFileId;
    }

}