<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatjoinrequest
 *
 * Represents a join request sent to a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatJoinRequest extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'chat',
            'from',
            'user_chat_id',
            'date',
            'bio',
            'invite_link',
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
            'chat' => $this->getChat(),
            'from' => $this->getFrom(),
            'user_chat_id' => $this->getUserChatId(),
            'date' => $this->getDate(),
            'bio' => $this->getBio(),
            'invite_link' => $this->getInviteLink(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Chat to which the request was sent 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * User that sent the join request 
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom", setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Identifier of a private chat with the user who sent the join request. This number may have more than 32 significant 
     * bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 
     * significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier. The bot can use this 
     * identifier for 5 minutes to send messages until the join request is processed, assuming no other administrator contacted the 
     * user. 
     *
     * @var int
     * @SerializedName("user_chat_id")
     * @Accessor(getter="getUserChatId", setter="setUserChatId")
     * @Type("int")
     */
    protected $userChatId;

    /**
     * Date the request was sent in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate", setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * Optional. Bio of the user. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("bio")
     * @Accessor(getter="getBio", setter="setBio")
     * @Type("string")
     */
    protected $bio;

    /**
     * Optional. Chat invite link that was used by the user to send the join request 
     *
     * @var ChatInviteLink|null
     * @SkipWhenEmpty
     * @SerializedName("invite_link")
     * @Accessor(getter="getInviteLink", setter="setInviteLink")
     * @Type("MadmagesTelegram\Types\Type\ChatInviteLink")
     */
    protected $inviteLink;


    /**
     * @param Chat $chat
     * @return static
     */
    public function setChat(Chat $chat): self
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param User $from
     * @return static
     */
    public function setFrom(User $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
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
     * @param string $bio
     * @return static
     */
    public function setBio(string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @param ChatInviteLink $inviteLink
     * @return static
     */
    public function setInviteLink(ChatInviteLink $inviteLink): self
    {
        $this->inviteLink = $inviteLink;

        return $this;
    }

    /**
     * @return ChatInviteLink|null
     */
    public function getInviteLink(): ?ChatInviteLink
    {
        return $this->inviteLink;
    }

}