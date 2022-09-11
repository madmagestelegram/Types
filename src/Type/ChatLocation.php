<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatlocation
 *
 * Represents a location to which a chat is connected. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatLocation extends AbstractType
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
            'address',
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
            'location' => $this->getLocation(),
            'address' => $this->getAddress(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The location to which the supergroup is connected. Can't be a live location. 
     *
     * @var Location
     * @SerializedName("location")
     * @Accessor(getter="getLocation", setter="setLocation")
     * @Type("MadmagesTelegram\Types\Type\Location")
     */
    protected $location;

    /**
     * Location address; 1-64 characters, as defined by the chat owner 
     *
     * @var string
     * @SerializedName("address")
     * @Accessor(getter="getAddress", setter="setAddress")
     * @Type("string")
     */
    protected $address;


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

}