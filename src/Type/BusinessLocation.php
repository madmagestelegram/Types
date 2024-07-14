<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#businesslocation
 *
 * Contains information about the location of a Telegram Business account. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BusinessLocation extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'address',
            'location',
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
            'address' => $this->getAddress(),
            'location' => $this->getLocation(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Address of the business 
     *
     * @var string
     * @SerializedName("address")
     * @Accessor(getter="getAddress", setter="setAddress")
     * @Type("string")
     */
    protected $address;

    /**
     * Optional. Location of the business 
     *
     * @var Location|null
     * @SkipWhenEmpty
     * @SerializedName("location")
     * @Accessor(getter="getLocation", setter="setLocation")
     * @Type("MadmagesTelegram\Types\Type\Location")
     */
    protected $location;


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
     * @param Location $location
     * @return static
     */
    public function setLocation(Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

}