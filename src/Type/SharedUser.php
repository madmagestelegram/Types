<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#shareduser
 *
 * This object contains information about a user that was shared with the bot using a KeyboardButtonRequestUsers button. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class SharedUser extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'user_id',
            'first_name',
            'last_name',
            'username',
            'photo',
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
            'user_id' => $this->getUserId(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'username' => $this->getUsername(),
            'photo' => $this->getPhoto(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Identifier of the shared user. This number may have more than 32 significant bits and some programming languages may 
     * have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so 64-bit integers or 
     * double-precision float types are safe for storing these identifiers. The bot may not have access to the user and could be unable to use 
     * this identifier, unless the user is already known to the bot by some other means. 
     *
     * @var int
     * @SerializedName("user_id")
     * @Accessor(getter="getUserId", setter="setUserId")
     * @Type("int")
     */
    protected $userId;

    /**
     * Optional. First name of the user, if the name was requested by the bot 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("first_name")
     * @Accessor(getter="getFirstName", setter="setFirstName")
     * @Type("string")
     */
    protected $firstName;

    /**
     * Optional. Last name of the user, if the name was requested by the bot 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("last_name")
     * @Accessor(getter="getLastName", setter="setLastName")
     * @Type("string")
     */
    protected $lastName;

    /**
     * Optional. Username of the user, if the username was requested by the bot 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("username")
     * @Accessor(getter="getUsername", setter="setUsername")
     * @Type("string")
     */
    protected $username;

    /**
     * Optional. Available sizes of the chat photo, if the photo was requested by the bot 
     *
     * @var PhotoSize[]|null
     * @SkipWhenEmpty
     * @SerializedName("photo")
     * @Accessor(getter="getPhoto", setter="setPhoto")
     * @Type("array<MadmagesTelegram\Types\Type\PhotoSize>")
     */
    protected $photo;


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
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
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
     * @return string|null
     */
    public function getFirstName(): ?string
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
     * @param string $username
     * @return static
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param PhotoSize[] $photo
     * @return static
     */
    public function setPhoto(array $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

}