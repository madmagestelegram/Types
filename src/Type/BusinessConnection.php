<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#businessconnection
 *
 * Describes the connection of the bot with a business account. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BusinessConnection extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'id',
            'user',
            'user_chat_id',
            'date',
            'can_reply',
            'is_enabled',
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
            'id' => $this->getId(),
            'user' => $this->getUser(),
            'user_chat_id' => $this->getUserChatId(),
            'date' => $this->getDate(),
            'can_reply' => $this->getCanReply(),
            'is_enabled' => $this->getIsEnabled(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier of the business connection 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId", setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * Business account user that created the business connection 
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser", setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * Identifier of a private chat with the user who created the business connection. This number may have more than 32 
     * significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 
     * significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. 
     *
     * @var int
     * @SerializedName("user_chat_id")
     * @Accessor(getter="getUserChatId", setter="setUserChatId")
     * @Type("int")
     */
    protected $userChatId;

    /**
     * Date the connection was established in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate", setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * True, if the bot can act on behalf of the business account in chats that were active in the last 24 hours 
     *
     * @var bool
     * @SerializedName("can_reply")
     * @Accessor(getter="getCanReply", setter="setCanReply")
     * @Type("bool")
     */
    protected $canReply;

    /**
     * True, if the connection is active 
     *
     * @var bool
     * @SerializedName("is_enabled")
     * @Accessor(getter="getIsEnabled", setter="setIsEnabled")
     * @Type("bool")
     */
    protected $isEnabled;


    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param User $user
     * @return static
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param int $userChatId
     * @return static
     */
    public function setUserChatId(int $userChatId): self
    {
        $this->userChatId = $userChatId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserChatId(): int
    {
        return $this->userChatId;
    }

    /**
     * @param int $date
     * @return static
     */
    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param bool $canReply
     * @return static
     */
    public function setCanReply(bool $canReply): self
    {
        $this->canReply = $canReply;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanReply(): bool
    {
        return $this->canReply;
    }

    /**
     * @param bool $isEnabled
     * @return static
     */
    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsEnabled(): bool
    {
        return $this->isEnabled;
    }

}