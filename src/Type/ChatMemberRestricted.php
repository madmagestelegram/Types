<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatmemberrestricted
 *
 * Represents a chat member that is under certain restrictions in the chat. Supergroups 
 * only. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatMemberRestricted extends AbstractChatMember
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
            'is_member',
            'can_change_info',
            'can_invite_users',
            'can_pin_messages',
            'can_send_messages',
            'can_send_media_messages',
            'can_send_polls',
            'can_send_other_messages',
            'can_add_web_page_previews',
            'until_date',
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
            'is_member' => $this->getIsMember(),
            'can_change_info' => $this->getCanChangeInfo(),
            'can_invite_users' => $this->getCanInviteUsers(),
            'can_pin_messages' => $this->getCanPinMessages(),
            'can_send_messages' => $this->getCanSendMessages(),
            'can_send_media_messages' => $this->getCanSendMediaMessages(),
            'can_send_polls' => $this->getCanSendPolls(),
            'can_send_other_messages' => $this->getCanSendOtherMessages(),
            'can_add_web_page_previews' => $this->getCanAddWebPagePreviews(),
            'until_date' => $this->getUntilDate(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The member's status in the chat, always “restricted” 
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
     * True, if the user is a member of the chat at the moment of the request 
     *
     * @var bool
     * @SerializedName("is_member")
     * @Accessor(getter="getIsMember",setter="setIsMember")
     * @Type("bool")
     */
    protected $isMember;

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
     * True, if the user is allowed to pin messages 
     *
     * @var bool
     * @SerializedName("can_pin_messages")
     * @Accessor(getter="getCanPinMessages",setter="setCanPinMessages")
     * @Type("bool")
     */
    protected $canPinMessages;

    /**
     * True, if the user is allowed to send text messages, contacts, locations and venues 
     *
     * @var bool
     * @SerializedName("can_send_messages")
     * @Accessor(getter="getCanSendMessages",setter="setCanSendMessages")
     * @Type("bool")
     */
    protected $canSendMessages;

    /**
     * True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes 
     *
     * @var bool
     * @SerializedName("can_send_media_messages")
     * @Accessor(getter="getCanSendMediaMessages",setter="setCanSendMediaMessages")
     * @Type("bool")
     */
    protected $canSendMediaMessages;

    /**
     * True, if the user is allowed to send polls 
     *
     * @var bool
     * @SerializedName("can_send_polls")
     * @Accessor(getter="getCanSendPolls",setter="setCanSendPolls")
     * @Type("bool")
     */
    protected $canSendPolls;

    /**
     * True, if the user is allowed to send animations, games, stickers and use inline bots 
     *
     * @var bool
     * @SerializedName("can_send_other_messages")
     * @Accessor(getter="getCanSendOtherMessages",setter="setCanSendOtherMessages")
     * @Type("bool")
     */
    protected $canSendOtherMessages;

    /**
     * True, if the user is allowed to add web page previews to their messages 
     *
     * @var bool
     * @SerializedName("can_add_web_page_previews")
     * @Accessor(getter="getCanAddWebPagePreviews",setter="setCanAddWebPagePreviews")
     * @Type("bool")
     */
    protected $canAddWebPagePreviews;

    /**
     * Date when restrictions will be lifted for this user; unix time. If 0, then the user is restricted forever 
     *
     * @var int
     * @SerializedName("until_date")
     * @Accessor(getter="getUntilDate",setter="setUntilDate")
     * @Type("int")
     */
    protected $untilDate;


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
     * @param bool $isMember
     * @return static
     */
    public function setIsMember(bool $isMember): self
    {
        $this->isMember = $isMember;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsMember(): bool
    {
        return $this->isMember;
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
     * @param bool $canPinMessages
     * @return static
     */
    public function setCanPinMessages(bool $canPinMessages): self
    {
        $this->canPinMessages = $canPinMessages;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanPinMessages(): bool
    {
        return $this->canPinMessages;
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
     * @return bool
     */
    public function getCanSendMessages(): bool
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
     * @return bool
     */
    public function getCanSendMediaMessages(): bool
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
     * @return bool
     */
    public function getCanSendPolls(): bool
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
     * @return bool
     */
    public function getCanSendOtherMessages(): bool
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
     * @return bool
     */
    public function getCanAddWebPagePreviews(): bool
    {
        return $this->canAddWebPagePreviews;
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
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->untilDate;
    }

}