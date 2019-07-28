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
     * Information about the user
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser",setter="setuser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * The member&#039;s status in the chat. Can be “creator”, “administrator”, “member”, “restricted”, “left” or “kicked”
     *
     * @var string
     * @SerializedName("status")
     * @Accessor(getter="getStatus",setter="setstatus")
     * @Type("string")
     */
    protected $status;

    /**
     * Optional. Restricted and kicked only. Date when restrictions will be lifted for this user, unix time
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("until_date")
     * @Accessor(getter="getUntilDate",setter="setuntilDate")
     * @Type("int")
     */
    protected $untilDate;

    /**
     * Optional. Administrators only. True, if the bot is allowed to edit administrator privileges of that user
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_be_edited")
     * @Accessor(getter="getCanBeEdited",setter="setcanBeEdited")
     * @Type("bool")
     */
    protected $canBeEdited;

    /**
     * Optional. Administrators only. True, if the administrator can change the chat title, photo and other settings
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_change_info")
     * @Accessor(getter="getCanChangeInfo",setter="setcanChangeInfo")
     * @Type("bool")
     */
    protected $canChangeInfo;

    /**
     * Optional. Administrators only. True, if the administrator can post in the channel, channels only
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_post_messages")
     * @Accessor(getter="getCanPostMessages",setter="setcanPostMessages")
     * @Type("bool")
     */
    protected $canPostMessages;

    /**
     * Optional. Administrators only. True, if the administrator can edit messages of other users and can pin messages, channels only
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_edit_messages")
     * @Accessor(getter="getCanEditMessages",setter="setcanEditMessages")
     * @Type("bool")
     */
    protected $canEditMessages;

    /**
     * Optional. Administrators only. True, if the administrator can delete messages of other users
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_delete_messages")
     * @Accessor(getter="getCanDeleteMessages",setter="setcanDeleteMessages")
     * @Type("bool")
     */
    protected $canDeleteMessages;

    /**
     * Optional. Administrators only. True, if the administrator can invite new users to the chat
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_invite_users")
     * @Accessor(getter="getCanInviteUsers",setter="setcanInviteUsers")
     * @Type("bool")
     */
    protected $canInviteUsers;

    /**
     * Optional. Administrators only. True, if the administrator can restrict, ban or unban chat members
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_restrict_members")
     * @Accessor(getter="getCanRestrictMembers",setter="setcanRestrictMembers")
     * @Type("bool")
     */
    protected $canRestrictMembers;

    /**
     * Optional. Administrators only. True, if the administrator can pin messages, groups and supergroups only
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_pin_messages")
     * @Accessor(getter="getCanPinMessages",setter="setcanPinMessages")
     * @Type("bool")
     */
    protected $canPinMessages;

    /**
     * Optional. Administrators only. True, if the administrator can add new administrators with a subset of his own privileges or demote administrators that he has promoted, directly or indirectly (promoted by administrators that were appointed by the user)
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_promote_members")
     * @Accessor(getter="getCanPromoteMembers",setter="setcanPromoteMembers")
     * @Type("bool")
     */
    protected $canPromoteMembers;

    /**
     * Optional. Restricted only. True, if the user is a member of the chat at the moment of the request
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_member")
     * @Accessor(getter="getIsMember",setter="setisMember")
     * @Type("bool")
     */
    protected $isMember;

    /**
     * Optional. Restricted only. True, if the user can send text messages, contacts, locations and venues
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_messages")
     * @Accessor(getter="getCanSendMessages",setter="setcanSendMessages")
     * @Type("bool")
     */
    protected $canSendMessages;

    /**
     * Optional. Restricted only. True, if the user can send audios, documents, photos, videos, video notes and voice notes, implies can_send_messages
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_media_messages")
     * @Accessor(getter="getCanSendMediaMessages",setter="setcanSendMediaMessages")
     * @Type("bool")
     */
    protected $canSendMediaMessages;

    /**
     * Optional. Restricted only. True, if the user can send animations, games, stickers and use inline bots, implies can_send_media_messages
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_other_messages")
     * @Accessor(getter="getCanSendOtherMessages",setter="setcanSendOtherMessages")
     * @Type("bool")
     */
    protected $canSendOtherMessages;

    /**
     * Optional. Restricted only. True, if user may add web page previews to his messages, implies can_send_media_messages
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_add_web_page_previews")
     * @Accessor(getter="getCanAddWebPagePreviews",setter="setcanAddWebPagePreviews")
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