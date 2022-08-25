<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatadministratorrights
 *
 * Represents the rights of an administrator in a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatAdministratorRights extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
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
        ];

        return parent::normalizeData($result);
    }

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
     * True, if the administrator can manage video chats 
     *
     * @var bool
     * @SerializedName("can_manage_video_chats")
     * @Accessor(getter="getCanManageVideoChats",setter="setCanManageVideoChats")
     * @Type("bool")
     */
    protected $canManageVideoChats;

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

}