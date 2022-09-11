<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputcontactmessagecontent
 *
 * Represents the content of a contact message to be sent as the result of an 
 * inline query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputContactMessageContent extends AbstractInputMessageContent
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'phone_number',
            'first_name',
            'last_name',
            'vcard',
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
            'phone_number' => $this->getPhoneNumber(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'vcard' => $this->getVcard(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Contact's phone number 
     *
     * @var string
     * @SerializedName("phone_number")
     * @Accessor(getter="getPhoneNumber", setter="setPhoneNumber")
     * @Type("string")
     */
    protected $phoneNumber;

    /**
     * Contact's first name 
     *
     * @var string
     * @SerializedName("first_name")
     * @Accessor(getter="getFirstName", setter="setFirstName")
     * @Type("string")
     */
    protected $firstName;

    /**
     * Optional. Contact's last name 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("last_name")
     * @Accessor(getter="getLastName", setter="setLastName")
     * @Type("string")
     */
    protected $lastName;

    /**
     * Optional. Additional data about the contact in the form of a vCard, 0-2048 bytes 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("vcard")
     * @Accessor(getter="getVcard", setter="setVcard")
     * @Type("string")
     */
    protected $vcard;


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
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $firstName
     * @return static
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     * @return static
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $vcard
     * @return static
     */
    public function setVcard(string $vcard): self
    {
        $this->vcard = $vcard;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVcard(): ?string
    {
        return $this->vcard;
    }

}