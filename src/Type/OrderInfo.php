<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#orderinfo
 *
 * This object represents information about an order. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class OrderInfo extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'name',
            'phone_number',
            'email',
            'shipping_address',
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
            'name' => $this->getName(),
            'phone_number' => $this->getPhoneNumber(),
            'email' => $this->getEmail(),
            'shipping_address' => $this->getShippingAddress(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. User name 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("name")
     * @Accessor(getter="getName", setter="setName")
     * @Type("string")
     */
    protected $name;

    /**
     * Optional. User's phone number 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("phone_number")
     * @Accessor(getter="getPhoneNumber", setter="setPhoneNumber")
     * @Type("string")
     */
    protected $phoneNumber;

    /**
     * Optional. User email 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("email")
     * @Accessor(getter="getEmail", setter="setEmail")
     * @Type("string")
     */
    protected $email;

    /**
     * Optional. User shipping address 
     *
     * @var ShippingAddress|null
     * @SkipWhenEmpty
     * @SerializedName("shipping_address")
     * @Accessor(getter="getShippingAddress", setter="setShippingAddress")
     * @Type("MadmagesTelegram\Types\Type\ShippingAddress")
     */
    protected $shippingAddress;


    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $phoneNumber
     * @return static
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $email
     * @return static
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ShippingAddress $shippingAddress
     * @return static
     */
    public function setShippingAddress(ShippingAddress $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return ShippingAddress|null
     */
    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shippingAddress;
    }

}