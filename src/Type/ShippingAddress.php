<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#shippingaddress
 *
 * This object represents a shipping address. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ShippingAddress extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'country_code',
            'state',
            'city',
            'street_line1',
            'street_line2',
            'post_code',
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
            'country_code' => $this->getCountryCode(),
            'state' => $this->getState(),
            'city' => $this->getCity(),
            'street_line1' => $this->getStreetLine1(),
            'street_line2' => $this->getStreetLine2(),
            'post_code' => $this->getPostCode(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * ISO 3166-1 alpha-2 country code 
     *
     * @var string
     * @SerializedName("country_code")
     * @Accessor(getter="getCountryCode",setter="setCountryCode")
     * @Type("string")
     */
    protected $countryCode;

    /**
     * State, if applicable 
     *
     * @var string
     * @SerializedName("state")
     * @Accessor(getter="getState",setter="setState")
     * @Type("string")
     */
    protected $state;

    /**
     * City 
     *
     * @var string
     * @SerializedName("city")
     * @Accessor(getter="getCity",setter="setCity")
     * @Type("string")
     */
    protected $city;

    /**
     * First line for the address 
     *
     * @var string
     * @SerializedName("street_line1")
     * @Accessor(getter="getStreetLine1",setter="setStreetLine1")
     * @Type("string")
     */
    protected $streetLine1;

    /**
     * Second line for the address 
     *
     * @var string
     * @SerializedName("street_line2")
     * @Accessor(getter="getStreetLine2",setter="setStreetLine2")
     * @Type("string")
     */
    protected $streetLine2;

    /**
     * Address post code 
     *
     * @var string
     * @SerializedName("post_code")
     * @Accessor(getter="getPostCode",setter="setPostCode")
     * @Type("string")
     */
    protected $postCode;


    /**
     * @param string $countryCode
     * @return static
     */
    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * @param string $state
     * @return static
     */
    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $city
     * @return static
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $streetLine1
     * @return static
     */
    public function setStreetLine1(string $streetLine1): self
    {
        $this->streetLine1 = $streetLine1;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetLine1(): string
    {
        return $this->streetLine1;
    }

    /**
     * @param string $streetLine2
     * @return static
     */
    public function setStreetLine2(string $streetLine2): self
    {
        $this->streetLine2 = $streetLine2;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreetLine2(): string
    {
        return $this->streetLine2;
    }

    /**
     * @param string $postCode
     * @return static
     */
    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode(): string
    {
        return $this->postCode;
    }

}