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
            'can_manage_video_chats',
            'can_restrict_members',
            'can_promote_members',
            'can_change_info',
            'can_invite_users',
            'can_post_messages',
            'can_edit_messages',
            'can_pin_messages',
            'can_post_stories',
            'can_edit_stories',
            'can_delete_stories',
            'can_manage_topics',
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
            'can_manage_video_chats' => $this->getCanManageVideoChats(),
            'can_restrict_members' => $this->getCanRestrictMembers(),
            'can_promote_members' => $this->getCanPromoteMembers(),
            'can_change_info' => $this->getCanChangeInfo(),
            'can_invite_users' => $this->getCanInviteUsers(),
            'can_post_messages' => $this->getCanPostMessages(),
            'can_edit_messages' => $this->getCanEditMessages(),
            'can_pin_messages' => $this->getCanPinMessages(),
            'can_post_stories' => $this->getCanPostStories(),
            'can_edit_stories' => $this->getCanEditStories(),
            'can_delete_stories' => $this->getCanDeleteStories(),
            'can_manage_topics' => $this->getCanManageTopics(),
            'custom_title' => $this->getCustomTitle(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The member's status in the chat, always “administrator” 
     *
     * @var string
     * @SerializedName("status")
     * @Accessor(getter="getStatus", setter="setStatus")
     * @Type("string")
     */
    protected $status;

    /**
     * Information about the user 
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser", setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * True, if the bot is allowed to edit administrator privileges of that user 
     *
     * @var bool
     * @SerializedName("can_be_edited")
     * @Accessor(getter="getCanBeEdited", setter="setCanBeEdited")
     * @Type("bool")
     */
    protected $canBeEdited;

    /**
     * True, if the user's presence in the chat is hidden 
     *
     * @var bool
     * @SerializedName("is_anonymous")
     * @Accessor(getter="getIsAnonymous", setter="setIsAnonymous")
     * @Type("bool")
     */
    protected $isAnonymous;

    /**
     * True, if the administrator can access the chat event log, boost list in channels, see channel members, report spam 
     * messages, see anonymous administrators in supergroups and ignore slow mode. Implied by any other administrator privilege 
     *
     * @var bool
     * @SerializedName("can_manage_chat")
     * @Accessor(getter="getCanManageChat", setter="setCanManageChat")
     * @Type("bool")
     */
    protected $canManageChat;

    /**
     * True, if the administrator can delete messages of other users 
     *
     * @var bool
     * @SerializedName("can_delete_messages")
     * @Accessor(getter="getCanDeleteMessages", setter="setCanDeleteMessages")
     * @Type("bool")
     */
    protected $canDeleteMessages;

    /**
     * True, if the administrator can manage video chats 
     *
     * @var bool
     * @SerializedName("can_manage_video_chats")
     * @Accessor(getter="getCanManageVideoChats", setter="setCanManageVideoChats")
     * @Type("bool")
     */
    protected $canManageVideoChats;

    /**
     * True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics 
     *
     * @var bool
     * @SerializedName("can_restrict_members")
     * @Accessor(getter="getCanRestrictMembers", setter="setCanRestrictMembers")
     * @Type("bool")
     */
    protected $canRestrictMembers;

    /**
     * True, if the administrator can add new administrators with a subset of their own privileges or demote 
     * administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user) 
     *
     * @var bool
     * @SerializedName("can_promote_members")
     * @Accessor(getter="getCanPromoteMembers", setter="setCanPromoteMembers")
     * @Type("bool")
     */
    protected $canPromoteMembers;

    /**
     * True, if the user is allowed to change the chat title, photo and other settings 
     *
     * @var bool
     * @SerializedName("can_change_info")
     * @Accessor(getter="getCanChangeInfo", setter="setCanChangeInfo")
     * @Type("bool")
     */
    protected $canChangeInfo;

    /**
     * True, if the user is allowed to invite new users to the chat 
     *
     * @var bool
     * @SerializedName("can_invite_users")
     * @Accessor(getter="getCanInviteUsers", setter="setCanInviteUsers")
     * @Type("bool")
     */
    protected $canInviteUsers;

    /**
     * Optional. True, if the administrator can post messages in the channel, or access channel statistics; channels only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_post_messages")
     * @Accessor(getter="getCanPostMessages", setter="setCanPostMessages")
     * @Type("bool")
     */
    protected $canPostMessages;

    /**
     * Optional. True, if the administrator can edit messages of other users and can pin messages; channels only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_edit_messages")
     * @Accessor(getter="getCanEditMessages", setter="setCanEditMessages")
     * @Type("bool")
     */
    protected $canEditMessages;

    /**
     * Optional. True, if the user is allowed to pin messages; groups and supergroups only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_pin_messages")
     * @Accessor(getter="getCanPinMessages", setter="setCanPinMessages")
     * @Type("bool")
     */
    protected $canPinMessages;

    /**
     * Optional. True, if the administrator can post stories in the channel; channels only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_post_stories")
     * @Accessor(getter="getCanPostStories", setter="setCanPostStories")
     * @Type("bool")
     */
    protected $canPostStories;

    /**
     * Optional. True, if the administrator can edit stories posted by other users; channels only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_edit_stories")
     * @Accessor(getter="getCanEditStories", setter="setCanEditStories")
     * @Type("bool")
     */
    protected $canEditStories;

    /**
     * Optional. True, if the administrator can delete stories posted by other users; channels only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_delete_stories")
     * @Accessor(getter="getCanDeleteStories", setter="setCanDeleteStories")
     * @Type("bool")
     */
    protected $canDeleteStories;

    /**
     * Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; supergroups only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_manage_topics")
     * @Accessor(getter="getCanManageTopics", setter="setCanManageTopics")
     * @Type("bool")
     */
    protected $canManageTopics;

    /**
     * Optional. Custom title for this user 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("custom_title")
     * @Accessor(getter="getCustomTitle", setter="setCustomTitle")
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
     * @param bool $canManageVideoChats
     * @return static
     */
    public function setCanManageVideoChats(bool $canManageVideoChats): self
    {
        $this->canManageVideoChats = $canManageVideoChats;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanManageVideoChats(): bool
    {
        return $this->canManageVideoChats;
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
     * @param bool $canPostStories
     * @return static
     */
    public function setCanPostStories(bool $canPostStories): self
    {
        $this->canPostStories = $canPostStories;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanPostStories(): ?bool
    {
        return $this->canPostStories;
    }

    /**
     * @param bool $canEditStories
     * @return static
     */
    public function setCanEditStories(bool $canEditStories): self
    {
        $this->canEditStories = $canEditStories;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanEditStories(): ?bool
    {
        return $this->canEditStories;
    }

    /**
     * @param bool $canDeleteStories
     * @return static
     */
    public function setCanDeleteStories(bool $canDeleteStories): self
    {
        $this->canDeleteStories = $canDeleteStories;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanDeleteStories(): ?bool
    {
        return $this->canDeleteStories;
    }

    /**
     * @param bool $canManageTopics
     * @return static
     */
    public function setCanManageTopics(bool $canManageTopics): self
    {
        $this->canManageTopics = $canManageTopics;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanManageTopics(): ?bool
    {
        return $this->canManageTopics;
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