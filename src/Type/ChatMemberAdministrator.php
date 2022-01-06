<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatmemberadministrator
 *
 * Represents a chat member that has some additional privileges. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatMemberAdministrator extends AbstractChatMember
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'status',
            'user',
            'can_be_edited',
            'is_anonymous',
            'can_manage_chat',
            'can_delete_messages',
            'can_manage_voice_chats',
            'can_restrict_members',
            'can_promote_members',
            'can_change_info',
            'can_invite_users',
            'can_post_messages',
            'can_edit_messages',
            'can_pin_messages',
            'custom_title',
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
            'status' => $this->getStatus(),
            'user' => $this->getUser(),
            'can_be_edited' => $this->getCanBeEdited(),
            'is_anonymous' => $this->getIsAnonymous(),
            'can_manage_chat' => $this->getCanManageChat(),
            'can_delete_messages' => $this->getCanDeleteMessages(),
            'can_manage_voice_chats' => $this->getCanManageVoiceChats(),
            'can_restrict_members' => $this->getCanRestrictMembers(),
            'can_promote_members' => $this->getCanPromoteMembers(),
            'can_change_info' => $this->getCanChangeInfo(),
            'can_invite_users' => $this->getCanInviteUsers(),
            'can_post_messages' => $this->getCanPostMessages(),
            'can_edit_messages' => $this->getCanEditMessages(),
            'can_pin_messages' => $this->getCanPinMessages(),
            'custom_title' => $this->getCustomTitle(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The member's status in the chat, always “administrator” 
     *
     * @var string
     * @SerializedName("status")
     * @Accessor(getter="getStatus",setter="setStatus")
     * @Type("string")
     */
    protected $status;

    /**
     * Information about the user 
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser",setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * True, if the bot is allowed to edit administrator privileges of that user 
     *
     * @var bool
     * @SerializedName("can_be_edited")
     * @Accessor(getter="getCanBeEdited",setter="setCanBeEdited")
     * @Type("bool")
     */
    protected $canBeEdited;

    /**
     * True, if the user's presence in the chat is hidden 
     *
     * @var bool
     * @SerializedName("is_anonymous")
     * @Accessor(getter="getIsAnonymous",setter="setIsAnonymous")
     * @Type("bool")
     */
    protected $isAnonymous;

    /**
     * True, if the administrator can access the chat event log, chat statistics, message statistics in channels, see 
     * channel members, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator 
     * privilege 
     *
     * @var bool
     * @SerializedName("can_manage_chat")
     * @Accessor(getter="getCanManageChat",setter="setCanManageChat")
     * @Type("bool")
     */
    protected $canManageChat;

    /**
     * True, if the administrator can delete messages of other users 
     *
     * @var bool
     * @SerializedName("can_delete_messages")
     * @Accessor(getter="getCanDeleteMessages",setter="setCanDeleteMessages")
     * @Type("bool")
     */
    protected $canDeleteMessages;

    /**
     * True, if the administrator can manage voice chats 
     *
     * @var bool
     * @SerializedName("can_manage_voice_chats")
     * @Accessor(getter="getCanManageVoiceChats",setter="setCanManageVoiceChats")
     * @Type("bool")
     */
    protected $canManageVoiceChats;

    /**
     * True, if the administrator can restrict, ban or unban chat members 
     *
     * @var bool
     * @SerializedName("can_restrict_members")
     * @Accessor(getter="getCanRestrictMembers",setter="setCanRestrictMembers")
     * @Type("bool")
     */
    protected $canRestrictMembers;

    /**
     * True, if the administrator can add new administrators with a subset of their own privileges or demote 
     * administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user) 
     *
     * @var bool
     * @SerializedName("can_promote_members")
     * @Accessor(getter="getCanPromoteMembers",setter="setCanPromoteMembers")
     * @Type("bool")
     */
    protected $canPromoteMembers;

    /**
     * True, if the user is allowed to change the chat title, photo and other settings 
     *
     * @var bool
     * @SerializedName("can_change_info")
     * @Accessor(getter="getCanChangeInfo",setter="setCanChangeInfo")
     * @Type("bool")
     */
    protected $canChangeInfo;

    /**
     * True, if the user is allowed to invite new users to the chat 
     *
     * @var bool
     * @SerializedName("can_invite_users")
     * @Accessor(getter="getCanInviteUsers",setter="setCanInviteUsers")
     * @Type("bool")
     */
    protected $canInviteUsers;

    /**
     * Optional. True, if the administrator can post in the channel; channels only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_post_messages")
     * @Accessor(getter="getCanPostMessages",setter="setCanPostMessages")
     * @Type("bool")
     */
    protected $canPostMessages;

    /**
     * Optional. True, if the administrator can edit messages of other users and can pin messages; channels only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_edit_messages")
     * @Accessor(getter="getCanEditMessages",setter="setCanEditMessages")
     * @Type("bool")
     */
    protected $canEditMessages;

    /**
     * Optional. True, if the user is allowed to pin messages; groups and supergroups only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_pin_messages")
     * @Accessor(getter="getCanPinMessages",setter="setCanPinMessages")
     * @Type("bool")
     */
    protected $canPinMessages;

    /**
     * Optional. Custom title for this user 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("custom_title")
     * @Accessor(getter="getCustomTitle",setter="setCustomTitle")
     * @Type("string")
     */
    protected $customTitle;


    /**
     * @param string $status
     * @return static
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
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
     * @param bool $canBeEdited
     * @return static
     */
    public function setCanBeEdited(bool $canBeEdited): self
    {
        $this->canBeEdited = $canBeEdited;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanBeEdited(): bool
    {
        return $this->canBeEdited;
    }

    /**
     * @param bool $isAnonymous
     * @return static
     */
    public function setIsAnonymous(bool $isAnonymous): self
    {
        $this->isAnonymous = $isAnonymous;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAnonymous(): bool
    {
        return $this->isAnonymous;
    }

    /**
     * @param bool $canManageChat
     * @return static
     */
    public function setCanManageChat(bool $canManageChat): self
    {
        $this->canManageChat = $canManageChat;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanManageChat(): bool
    {
        return $this->canManageChat;
    }

    /**
     * @param bool $canDeleteMessages
     * @return static
     */
    public function setCanDeleteMessages(bool $canDeleteMessages): self
    {
        $this->canDeleteMessages = $canDeleteMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanDeleteMessages(): bool
    {
        return $this->canDeleteMessages;
    }

    /**
     * @param bool $canManageVoiceChats
     * @return static
     */
    public function setCanManageVoiceChats(bool $canManageVoiceChats): self
    {
        $this->canManageVoiceChats = $canManageVoiceChats;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanManageVoiceChats(): bool
    {
        return $this->canManageVoiceChats;
    }

    /**
     * @param bool $canRestrictMembers
     * @return static
     */
    public function setCanRestrictMembers(bool $canRestrictMembers): self
    {
        $this->canRestrictMembers = $canRestrictMembers;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanRestrictMembers(): bool
    {
        return $this->canRestrictMembers;
    }

    /**
     * @param bool $canPromoteMembers
     * @return static
     */
    public function setCanPromoteMembers(bool $canPromoteMembers): self
    {
        $this->canPromoteMembers = $canPromoteMembers;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanPromoteMembers(): bool
    {
        return $this->canPromoteMembers;
    }

    /**
     * @param bool $canChangeInfo
     * @return static
     */
    public function setCanChangeInfo(bool $canChangeInfo): self
    {
        $this->canChangeInfo = $canChangeInfo;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanChangeInfo(): bool
    {
        return $this->canChangeInfo;
    }

    /**
     * @param bool $canInviteUsers
     * @return static
     */
    public function setCanInviteUsers(bool $canInviteUsers): self
    {
        $this->canInviteUsers = $canInviteUsers;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanInviteUsers(): bool
    {
        return $this->canInviteUsers;
    }

    /**
     * @param bool $canPostMessages
     * @return static
     */
    public function setCanPostMessages(bool $canPostMessages): self
    {
        $this->canPostMessages = $canPostMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanPostMessages(): ?bool
    {
        return $this->canPostMessages;
    }

    /**
     * @param bool $canEditMessages
     * @return static
     */
    public function setCanEditMessages(bool $canEditMessages): self
    {
        $this->canEditMessages = $canEditMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanEditMessages(): ?bool
    {
        return $this->canEditMessages;
    }

    /**
     * @param bool $canPinMessages
     * @return static
     */
    public function setCanPinMessages(bool $canPinMessages): self
    {
        $this->canPinMessages = $canPinMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanPinMessages(): ?bool
    {
        return $this->canPinMessages;
    }

    /**
     * @param string $customTitle
     * @return static
     */
    public function setCustomTitle(string $customTitle): self
    {
        $this->customTitle = $customTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle(): ?string
    {
        return $this->customTitle;
    }

}