<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatmember
 *
 * This object contains information about one member of a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatMember extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'user',
            'status',
            'custom_title',
            'until_date',
            'can_be_edited',
            'can_post_messages',
            'can_edit_messages',
            'can_delete_messages',
            'can_restrict_members',
            'can_promote_members',
            'can_change_info',
            'can_invite_users',
            'can_pin_messages',
            'is_member',
            'can_send_messages',
            'can_send_media_messages',
            'can_send_polls',
            'can_send_other_messages',
            'can_add_web_page_previews',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getRawData(): array
    {
        $result = [
            'user' => $this->getUser(),
            'status' => $this->getStatus(),
            'custom_title' => $this->getCustomTitle(),
            'until_date' => $this->getUntilDate(),
            'can_be_edited' => $this->getCanBeEdited(),
            'can_post_messages' => $this->getCanPostMessages(),
            'can_edit_messages' => $this->getCanEditMessages(),
            'can_delete_messages' => $this->getCanDeleteMessages(),
            'can_restrict_members' => $this->getCanRestrictMembers(),
            'can_promote_members' => $this->getCanPromoteMembers(),
            'can_change_info' => $this->getCanChangeInfo(),
            'can_invite_users' => $this->getCanInviteUsers(),
            'can_pin_messages' => $this->getCanPinMessages(),
            'is_member' => $this->getIsMember(),
            'can_send_messages' => $this->getCanSendMessages(),
            'can_send_media_messages' => $this->getCanSendMediaMessages(),
            'can_send_polls' => $this->getCanSendPolls(),
            'can_send_other_messages' => $this->getCanSendOtherMessages(),
            'can_add_web_page_previews' => $this->getCanAddWebPagePreviews(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

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
     * The member&#039;s status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
     *
     * @var string
     * @SerializedName("status")
     * @Accessor(getter="getStatus",setter="setStatus")
     * @Type("string")
     */
    protected $status;

    /**
     * Optional. Owner and administrators only. Custom title for this user
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("custom_title")
     * @Accessor(getter="getCustomTitle",setter="setCustomTitle")
     * @Type("string")
     */
    protected $customTitle;

    /**
     * Optional. Restricted and kicked only. Date when restrictions will be lifted for this user; unix time
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("until_date")
     * @Accessor(getter="getUntilDate",setter="setUntilDate")
     * @Type("int")
     */
    protected $untilDate;

    /**
     * Optional. Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_be_edited")
     * @Accessor(getter="getCanBeEdited",setter="setCanBeEdited")
     * @Type("bool")
     */
    protected $canBeEdited;

    /**
     * Optional. Administrators only. True, if the administrator can post in the channel; channels only
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_post_messages")
     * @Accessor(getter="getCanPostMessages",setter="setCanPostMessages")
     * @Type("bool")
     */
    protected $canPostMessages;

    /**
     * Optional. Administrators only. True, if the administrator can edit messages of other users and can pin messages; channels only
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_edit_messages")
     * @Accessor(getter="getCanEditMessages",setter="setCanEditMessages")
     * @Type("bool")
     */
    protected $canEditMessages;

    /**
     * Optional. Administrators only. True, if the administrator can delete messages of other users
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_delete_messages")
     * @Accessor(getter="getCanDeleteMessages",setter="setCanDeleteMessages")
     * @Type("bool")
     */
    protected $canDeleteMessages;

    /**
     * Optional. Administrators only. True, if the administrator can restrict, ban or unban chat members
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_restrict_members")
     * @Accessor(getter="getCanRestrictMembers",setter="setCanRestrictMembers")
     * @Type("bool")
     */
    protected $canRestrictMembers;

    /**
     * Optional. Administrators only. True, if the administrator can add new administrators with a subset of his own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user)
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_promote_members")
     * @Accessor(getter="getCanPromoteMembers",setter="setCanPromoteMembers")
     * @Type("bool")
     */
    protected $canPromoteMembers;

    /**
     * Optional. Administrators and restricted only. True, if the user is allowed to change the chat title, photo and other settings
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_change_info")
     * @Accessor(getter="getCanChangeInfo",setter="setCanChangeInfo")
     * @Type("bool")
     */
    protected $canChangeInfo;

    /**
     * Optional. Administrators and restricted only. True, if the user is allowed to invite new users to the chat
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_invite_users")
     * @Accessor(getter="getCanInviteUsers",setter="setCanInviteUsers")
     * @Type("bool")
     */
    protected $canInviteUsers;

    /**
     * Optional. Administrators and restricted only. True, if the user is allowed to pin messages; groups and supergroups only
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_pin_messages")
     * @Accessor(getter="getCanPinMessages",setter="setCanPinMessages")
     * @Type("bool")
     */
    protected $canPinMessages;

    /**
     * Optional. Restricted only. True, if the user is a member of the chat at the moment of the request
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_member")
     * @Accessor(getter="getIsMember",setter="setIsMember")
     * @Type("bool")
     */
    protected $isMember;

    /**
     * Optional. Restricted only. True, if the user is allowed to send text messages, contacts, locations and venues
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_messages")
     * @Accessor(getter="getCanSendMessages",setter="setCanSendMessages")
     * @Type("bool")
     */
    protected $canSendMessages;

    /**
     * Optional. Restricted only. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_media_messages")
     * @Accessor(getter="getCanSendMediaMessages",setter="setCanSendMediaMessages")
     * @Type("bool")
     */
    protected $canSendMediaMessages;

    /**
     * Optional. Restricted only. True, if the user is allowed to send polls
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_polls")
     * @Accessor(getter="getCanSendPolls",setter="setCanSendPolls")
     * @Type("bool")
     */
    protected $canSendPolls;

    /**
     * Optional. Restricted only. True, if the user is allowed to send animations, games, stickers and use inline bots
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_other_messages")
     * @Accessor(getter="getCanSendOtherMessages",setter="setCanSendOtherMessages")
     * @Type("bool")
     */
    protected $canSendOtherMessages;

    /**
     * Optional. Restricted only. True, if the user is allowed to add web page previews to their messages
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_add_web_page_previews")
     * @Accessor(getter="getCanAddWebPagePreviews",setter="setCanAddWebPagePreviews")
     * @Type("bool")
     */
    protected $canAddWebPagePreviews;


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

    /**
     * @param int $untilDate
     * @return static
     */
    public function setUntilDate(int $untilDate): self
    {
        $this->untilDate = $untilDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUntilDate(): ?int
    {
        return $this->untilDate;
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
     * @return bool|null
     */
    public function getCanBeEdited(): ?bool
    {
        return $this->canBeEdited;
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
     * @param bool $canDeleteMessages
     * @return static
     */
    public function setCanDeleteMessages(bool $canDeleteMessages): self
    {
        $this->canDeleteMessages = $canDeleteMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanDeleteMessages(): ?bool
    {
        return $this->canDeleteMessages;
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
     * @return bool|null
     */
    public function getCanRestrictMembers(): ?bool
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
     * @return bool|null
     */
    public function getCanPromoteMembers(): ?bool
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
     * @return bool|null
     */
    public function getCanChangeInfo(): ?bool
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
     * @return bool|null
     */
    public function getCanInviteUsers(): ?bool
    {
        return $this->canInviteUsers;
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
     * @param bool $isMember
     * @return static
     */
    public function setIsMember(bool $isMember): self
    {
        $this->isMember = $isMember;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMember(): ?bool
    {
        return $this->isMember;
    }

    /**
     * @param bool $canSendMessages
     * @return static
     */
    public function setCanSendMessages(bool $canSendMessages): self
    {
        $this->canSendMessages = $canSendMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendMessages(): ?bool
    {
        return $this->canSendMessages;
    }

    /**
     * @param bool $canSendMediaMessages
     * @return static
     */
    public function setCanSendMediaMessages(bool $canSendMediaMessages): self
    {
        $this->canSendMediaMessages = $canSendMediaMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendMediaMessages(): ?bool
    {
        return $this->canSendMediaMessages;
    }

    /**
     * @param bool $canSendPolls
     * @return static
     */
    public function setCanSendPolls(bool $canSendPolls): self
    {
        $this->canSendPolls = $canSendPolls;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendPolls(): ?bool
    {
        return $this->canSendPolls;
    }

    /**
     * @param bool $canSendOtherMessages
     * @return static
     */
    public function setCanSendOtherMessages(bool $canSendOtherMessages): self
    {
        $this->canSendOtherMessages = $canSendOtherMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendOtherMessages(): ?bool
    {
        return $this->canSendOtherMessages;
    }

    /**
     * @param bool $canAddWebPagePreviews
     * @return static
     */
    public function setCanAddWebPagePreviews(bool $canAddWebPagePreviews): self
    {
        $this->canAddWebPagePreviews = $canAddWebPagePreviews;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanAddWebPagePreviews(): ?bool
    {
        return $this->canAddWebPagePreviews;
    }

}