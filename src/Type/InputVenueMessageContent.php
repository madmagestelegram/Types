<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputvenuemessagecontent
 *
 * Represents the content of a venue 
 * message to be sent as the result of an inline query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputVenueMessageContent extends AbstractInputMessageContent
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'latitude',
            'longitude',
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
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
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
     * Latitude of the venue in degrees 
     *
     * @var float
     * @SerializedName("latitude")
     * @Accessor(getter="getLatitude",setter="setLatitude")
     * @Type("float")
     */
    protected $latitude;

    /**
     * Longitude of the venue in degrees 
     *
     * @var float
     * @SerializedName("longitude")
     * @Accessor(getter="getLongitude",setter="setLongitude")
     * @Type("float")
     */
    protected $longitude;

    /**
     * Name of the venue 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Address of the venue 
     *
     * @var string
     * @SerializedName("address")
     * @Accessor(getter="getAddress",setter="setAddress")
     * @Type("string")
     */
    protected $address;

    /**
     * Optional. Foursquare identifier of the venue, if known 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("foursquare_id")
     * @Accessor(getter="getFoursquareId",setter="setFoursquareId")
     * @Type("string")
     */
    protected $foursquareId;

    /**
     * Optional. Foursquare type of the venue, if known. (For example, “arts_entertainment/default”, 
     * “arts_entertainment/aquarium” or “food/icecream”.) 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("foursquare_type")
     * @Accessor(getter="getFoursquareType",setter="setFoursquareType")
     * @Type("string")
     */
    protected $foursquareType;


    /**
     * @param float $latitude
     * @return static
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $longitude
     * @return static
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
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