<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#contact
 *
 * This object represents a phone contact. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Contact extends AbstractType
{
    /**
     * Contact&#039;s phone number
     *
     * @var string
     * @SerializedName("phone_number")
     * @Accessor(getter="getPhoneNumber",setter="setphoneNumber")
     * @Type("string")
     */
    protected $phoneNumber;

    /**
     * Contact&#039;s first name
     *
     * @var string
     * @SerializedName("first_name")
     * @Accessor(getter="getFirstName",setter="setfirstName")
     * @Type("string")
     */
    protected $firstName;

    /**
     * Optional. Contact&#039;s last name
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("last_name")
     * @Accessor(getter="getLastName",setter="setlastName")
     * @Type("string")
     */
    protected $lastName;

    /**
     * Optional. Contact&#039;s user identifier in Telegram
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("user_id")
     * @Accessor(getter="getUserId",setter="setuserId")
     * @Type("int")
     */
    protected $userId;

    /**
     * Optional. Additional data about the contact in the form of a vCard
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("vcard")
     * @Accessor(getter="getVcard",setter="setvcard")
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
     * @param int $userId
     * @return static
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
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