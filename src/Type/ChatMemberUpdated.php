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
            'via_join_request',
            'via_chat_folder_invite_link',
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
            'via_join_request' => $this->getViaJoinRequest(),
            'via_chat_folder_invite_link' => $this->getViaChatFolderInviteLink(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Chat the user belongs to 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * Performer of the action, which resulted in the change 
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom", setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Date the change was done in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate", setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * Previous information about the chat member 
     *
     * @var AbstractChatMember
     * @SerializedName("old_chat_member")
     * @Accessor(getter="getOldChatMember", setter="setOldChatMember")
     * @Type("MadmagesTelegram\Types\Type\AbstractChatMember")
     */
    protected $oldChatMember;

    /**
     * New information about the chat member 
     *
     * @var AbstractChatMember
     * @SerializedName("new_chat_member")
     * @Accessor(getter="getNewChatMember", setter="setNewChatMember")
     * @Type("MadmagesTelegram\Types\Type\AbstractChatMember")
     */
    protected $newChatMember;

    /**
     * Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only. 
     *
     * @var ChatInviteLink|null
     * @SkipWhenEmpty
     * @SerializedName("invite_link")
     * @Accessor(getter="getInviteLink", setter="setInviteLink")
     * @Type("MadmagesTelegram\Types\Type\ChatInviteLink")
     */
    protected $inviteLink;

    /**
     * Optional. True, if the user joined the chat after sending a direct join request without using an invite link and being 
     * approved by an administrator 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("via_join_request")
     * @Accessor(getter="getViaJoinRequest", setter="setViaJoinRequest")
     * @Type("bool")
     */
    protected $viaJoinRequest;

    /**
     * Optional. True, if the user joined the chat via a chat folder invite link 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("via_chat_folder_invite_link")
     * @Accessor(getter="getViaChatFolderInviteLink", setter="setViaChatFolderInviteLink")
     * @Type("bool")
     */
    protected $viaChatFolderInviteLink;


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
     * @param AbstractChatMember $oldChatMember
     * @return static
     */
    public function setOldChatMember(AbstractChatMember $oldChatMember): self
    {
        $this->oldChatMember = $oldChatMember;

        return $this;
    }

    /**
     * @return AbstractChatMember
     */
    public function getOldChatMember(): AbstractChatMember
    {
        return $this->oldChatMember;
    }

    /**
     * @param AbstractChatMember $newChatMember
     * @return static
     */
    public function setNewChatMember(AbstractChatMember $newChatMember): self
    {
        $this->newChatMember = $newChatMember;

        return $this;
    }

    /**
     * @return AbstractChatMember
     */
    public function getNewChatMember(): AbstractChatMember
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

    /**
     * @param bool $viaJoinRequest
     * @return static
     */
    public function setViaJoinRequest(bool $viaJoinRequest): self
    {
        $this->viaJoinRequest = $viaJoinRequest;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getViaJoinRequest(): ?bool
    {
        return $this->viaJoinRequest;
    }

    /**
     * @param bool $viaChatFolderInviteLink
     * @return static
     */
    public function setViaChatFolderInviteLink(bool $viaChatFolderInviteLink): self
    {
        $this->viaChatFolderInviteLink = $viaChatFolderInviteLink;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getViaChatFolderInviteLink(): ?bool
    {
        return $this->viaChatFolderInviteLink;
    }

}