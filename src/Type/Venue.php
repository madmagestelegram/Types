<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#venue
 *
 * This object represents a venue. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Venue extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'location',
            'title',
            'address',
            'foursquare_id',
            'foursquare_type',
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
            'location' => $this->getLocation(),
            'title' => $this->getTitle(),
            'address' => $this->getAddress(),
            'foursquare_id' => $this->getFoursquareId(),
            'foursquare_type' => $this->getFoursquareType(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Venue location
     *
     * @var Location
     * @SerializedName("location")
     * @Accessor(getter="getLocation",setter="setlocation")
     * @Type("MadmagesTelegram\Types\Type\Location")
     */
    protected $location;

    /**
     * Name of the venue
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="settitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Address of the venue
     *
     * @var string
     * @SerializedName("address")
     * @Accessor(getter="getAddress",setter="setaddress")
     * @Type("string")
     */
    protected $address;

    /**
     * Optional. Foursquare identifier of the venue
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("foursquare_id")
     * @Accessor(getter="getFoursquareId",setter="setfoursquareId")
     * @Type("string")
     */
    protected $foursquareId;

    /**
     * Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("foursquare_type")
     * @Accessor(getter="getFoursquareType",setter="setfoursquareType")
     * @Type("string")
     */
    protected $foursquareType;


    /**
     * @param Location $location
     * @return static
     */
    public function setLocation(Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $address
     * @return static
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $foursquareId
     * @return static
     */
    public function setFoursquareId(string $foursquareId): self
    {
        $this->foursquareId = $foursquareId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFoursquareId(): ?string
    {
        return $this->foursquareId;
    }

    /**
     * @param string $foursquareType
     * @return static
     */
    public function setFoursquareType(string $foursquareType): self
    {
        $this->foursquareType = $foursquareType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFoursquareType(): ?string
    {
        return $this->foursquareType;
    }

}