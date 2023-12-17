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
            'can_send_messages',
            'can_send_audios',
            'can_send_documents',
            'can_send_photos',
            'can_send_videos',
            'can_send_video_notes',
            'can_send_voice_notes',
            'can_send_polls',
            'can_send_other_messages',
            'can_add_web_page_previews',
            'can_change_info',
            'can_invite_users',
            'can_pin_messages',
            'can_manage_topics',
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
            'can_send_messages' => $this->getCanSendMessages(),
            'can_send_audios' => $this->getCanSendAudios(),
            'can_send_documents' => $this->getCanSendDocuments(),
            'can_send_photos' => $this->getCanSendPhotos(),
            'can_send_videos' => $this->getCanSendVideos(),
            'can_send_video_notes' => $this->getCanSendVideoNotes(),
            'can_send_voice_notes' => $this->getCanSendVoiceNotes(),
            'can_send_polls' => $this->getCanSendPolls(),
            'can_send_other_messages' => $this->getCanSendOtherMessages(),
            'can_add_web_page_previews' => $this->getCanAddWebPagePreviews(),
            'can_change_info' => $this->getCanChangeInfo(),
            'can_invite_users' => $this->getCanInviteUsers(),
            'can_pin_messages' => $this->getCanPinMessages(),
            'can_manage_topics' => $this->getCanManageTopics(),
            'until_date' => $this->getUntilDate(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The member's status in the chat, always “restricted” 
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
     * True, if the user is a member of the chat at the moment of the request 
     *
     * @var bool
     * @SerializedName("is_member")
     * @Accessor(getter="getIsMember", setter="setIsMember")
     * @Type("bool")
     */
    protected $isMember;

    /**
     * True, if the user is allowed to send text messages, contacts, invoices, locations and venues 
     *
     * @var bool
     * @SerializedName("can_send_messages")
     * @Accessor(getter="getCanSendMessages", setter="setCanSendMessages")
     * @Type("bool")
     */
    protected $canSendMessages;

    /**
     * True, if the user is allowed to send audios 
     *
     * @var bool
     * @SerializedName("can_send_audios")
     * @Accessor(getter="getCanSendAudios", setter="setCanSendAudios")
     * @Type("bool")
     */
    protected $canSendAudios;

    /**
     * True, if the user is allowed to send documents 
     *
     * @var bool
     * @SerializedName("can_send_documents")
     * @Accessor(getter="getCanSendDocuments", setter="setCanSendDocuments")
     * @Type("bool")
     */
    protected $canSendDocuments;

    /**
     * True, if the user is allowed to send photos 
     *
     * @var bool
     * @SerializedName("can_send_photos")
     * @Accessor(getter="getCanSendPhotos", setter="setCanSendPhotos")
     * @Type("bool")
     */
    protected $canSendPhotos;

    /**
     * True, if the user is allowed to send videos 
     *
     * @var bool
     * @SerializedName("can_send_videos")
     * @Accessor(getter="getCanSendVideos", setter="setCanSendVideos")
     * @Type("bool")
     */
    protected $canSendVideos;

    /**
     * True, if the user is allowed to send video notes 
     *
     * @var bool
     * @SerializedName("can_send_video_notes")
     * @Accessor(getter="getCanSendVideoNotes", setter="setCanSendVideoNotes")
     * @Type("bool")
     */
    protected $canSendVideoNotes;

    /**
     * True, if the user is allowed to send voice notes 
     *
     * @var bool
     * @SerializedName("can_send_voice_notes")
     * @Accessor(getter="getCanSendVoiceNotes", setter="setCanSendVoiceNotes")
     * @Type("bool")
     */
    protected $canSendVoiceNotes;

    /**
     * True, if the user is allowed to send polls 
     *
     * @var bool
     * @SerializedName("can_send_polls")
     * @Accessor(getter="getCanSendPolls", setter="setCanSendPolls")
     * @Type("bool")
     */
    protected $canSendPolls;

    /**
     * True, if the user is allowed to send animations, games, stickers and use inline bots 
     *
     * @var bool
     * @SerializedName("can_send_other_messages")
     * @Accessor(getter="getCanSendOtherMessages", setter="setCanSendOtherMessages")
     * @Type("bool")
     */
    protected $canSendOtherMessages;

    /**
     * True, if the user is allowed to add web page previews to their messages 
     *
     * @var bool
     * @SerializedName("can_add_web_page_previews")
     * @Accessor(getter="getCanAddWebPagePreviews", setter="setCanAddWebPagePreviews")
     * @Type("bool")
     */
    protected $canAddWebPagePreviews;

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
     * True, if the user is allowed to pin messages 
     *
     * @var bool
     * @SerializedName("can_pin_messages")
     * @Accessor(getter="getCanPinMessages", setter="setCanPinMessages")
     * @Type("bool")
     */
    protected $canPinMessages;

    /**
     * True, if the user is allowed to create forum topics 
     *
     * @var bool
     * @SerializedName("can_manage_topics")
     * @Accessor(getter="getCanManageTopics", setter="setCanManageTopics")
     * @Type("bool")
     */
    protected $canManageTopics;

    /**
     * Date when restrictions will be lifted for this user; Unix time. If 0, then the user is restricted forever 
     *
     * @var int
     * @SerializedName("until_date")
     * @Accessor(getter="getUntilDate", setter="setUntilDate")
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
     * @param bool $canSendAudios
     * @return static
     */
    public function setCanSendAudios(bool $canSendAudios): self
    {
        $this->canSendAudios = $canSendAudios;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendAudios(): bool
    {
        return $this->canSendAudios;
    }

    /**
     * @param bool $canSendDocuments
     * @return static
     */
    public function setCanSendDocuments(bool $canSendDocuments): self
    {
        $this->canSendDocuments = $canSendDocuments;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendDocuments(): bool
    {
        return $this->canSendDocuments;
    }

    /**
     * @param bool $canSendPhotos
     * @return static
     */
    public function setCanSendPhotos(bool $canSendPhotos): self
    {
        $this->canSendPhotos = $canSendPhotos;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendPhotos(): bool
    {
        return $this->canSendPhotos;
    }

    /**
     * @param bool $canSendVideos
     * @return static
     */
    public function setCanSendVideos(bool $canSendVideos): self
    {
        $this->canSendVideos = $canSendVideos;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendVideos(): bool
    {
        return $this->canSendVideos;
    }

    /**
     * @param bool $canSendVideoNotes
     * @return static
     */
    public function setCanSendVideoNotes(bool $canSendVideoNotes): self
    {
        $this->canSendVideoNotes = $canSendVideoNotes;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendVideoNotes(): bool
    {
        return $this->canSendVideoNotes;
    }

    /**
     * @param bool $canSendVoiceNotes
     * @return static
     */
    public function setCanSendVoiceNotes(bool $canSendVoiceNotes): self
    {
        $this->canSendVoiceNotes = $canSendVoiceNotes;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSendVoiceNotes(): bool
    {
        return $this->canSendVoiceNotes;
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
     * @param bool $canManageTopics
     * @return static
     */
    public function setCanManageTopics(bool $canManageTopics): self
    {
        $this->canManageTopics = $canManageTopics;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanManageTopics(): bool
    {
        return $this->canManageTopics;
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