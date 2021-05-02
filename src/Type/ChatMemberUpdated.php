<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatmemberupdated
 *
 * This object represents changes in the status of a chat member. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatMemberUpdated extends AbstractType
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
            'date',
            'old_chat_member',
            'new_chat_member',
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
            'date' => $this->getDate(),
            'old_chat_member' => $this->getOldChatMember(),
            'new_chat_member' => $this->getNewChatMember(),
            'invite_link' => $this->getInviteLink(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Chat the user belongs to 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat",setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * Performer of the action, which resulted in the change 
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom",setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Date the change was done in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate",setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * Previous information about the chat member 
     *
     * @var ChatMember
     * @SerializedName("old_chat_member")
     * @Accessor(getter="getOldChatMember",setter="setOldChatMember")
     * @Type("MadmagesTelegram\Types\Type\ChatMember")
     */
    protected $oldChatMember;

    /**
     * New information about the chat member 
     *
     * @var ChatMember
     * @SerializedName("new_chat_member")
     * @Accessor(getter="getNewChatMember",setter="setNewChatMember")
     * @Type("MadmagesTelegram\Types\Type\ChatMember")
     */
    protected $newChatMember;

    /**
     * Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only. 
     *
     * @var ChatInviteLink|null
     * @SkipWhenEmpty
     * @SerializedName("invite_link")
     * @Accessor(getter="getInviteLink",setter="setInviteLink")
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
     * @param ChatMember $oldChatMember
     * @return static
     */
    public function setOldChatMember(ChatMember $oldChatMember): self
    {
        $this->oldChatMember = $oldChatMember;

        return $this;
    }

    /**
     * @return ChatMember
     */
    public function getOldChatMember(): ChatMember
    {
        return $this->oldChatMember;
    }

    /**
     * @param ChatMember $newChatMember
     * @return static
     */
    public function setNewChatMember(ChatMember $newChatMember): self
    {
        $this->newChatMember = $newChatMember;

        return $this;
    }

    /**
     * @return ChatMember
     */
    public function getNewChatMember(): ChatMember
    {
        return $this->newChatMember;
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