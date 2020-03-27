<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#userprofilephotos
 *
 * This object represent a user's profile pictures. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class UserProfilePhotos extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'total_count',
            'photos',
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
            'total_count' => $this->getTotalCount(),
            'photos' => $this->getPhotos(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Total number of profile pictures the target user has 
     *
     * @var int
     * @SerializedName("total_count")
     * @Accessor(getter="getTotalCount",setter="setTotalCount")
     * @Type("int")
     */
    protected $totalCount;

    /**
     * Requested profile pictures (in up to 4 sizes each) 
     *
     * @var array[]
     * @SerializedName("photos")
     * @Accessor(getter="getPhotos",setter="setPhotos")
     * @Type("array<array>")
     */
    protected $photos;


    /**
     * @param int $totalCount
     * @return static
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * @param array[] $photos
     * @return static
     */
    public function setPhotos(array $photos): self
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * @return array[]
     */
    public function getPhotos(): array
    {
        return $this->photos;
    }

}