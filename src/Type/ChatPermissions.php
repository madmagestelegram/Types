<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatpermissions
 *
 * Describes actions that a non-administrator user is allowed to take in a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatPermissions extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
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
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. True, if the user is allowed to send text messages, contacts, invoices, locations and venues 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_messages")
     * @Accessor(getter="getCanSendMessages", setter="setCanSendMessages")
     * @Type("bool")
     */
    protected $canSendMessages;

    /**
     * Optional. True, if the user is allowed to send audios 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_audios")
     * @Accessor(getter="getCanSendAudios", setter="setCanSendAudios")
     * @Type("bool")
     */
    protected $canSendAudios;

    /**
     * Optional. True, if the user is allowed to send documents 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_documents")
     * @Accessor(getter="getCanSendDocuments", setter="setCanSendDocuments")
     * @Type("bool")
     */
    protected $canSendDocuments;

    /**
     * Optional. True, if the user is allowed to send photos 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_photos")
     * @Accessor(getter="getCanSendPhotos", setter="setCanSendPhotos")
     * @Type("bool")
     */
    protected $canSendPhotos;

    /**
     * Optional. True, if the user is allowed to send videos 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_videos")
     * @Accessor(getter="getCanSendVideos", setter="setCanSendVideos")
     * @Type("bool")
     */
    protected $canSendVideos;

    /**
     * Optional. True, if the user is allowed to send video notes 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_video_notes")
     * @Accessor(getter="getCanSendVideoNotes", setter="setCanSendVideoNotes")
     * @Type("bool")
     */
    protected $canSendVideoNotes;

    /**
     * Optional. True, if the user is allowed to send voice notes 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_voice_notes")
     * @Accessor(getter="getCanSendVoiceNotes", setter="setCanSendVoiceNotes")
     * @Type("bool")
     */
    protected $canSendVoiceNotes;

    /**
     * Optional. True, if the user is allowed to send polls 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_polls")
     * @Accessor(getter="getCanSendPolls", setter="setCanSendPolls")
     * @Type("bool")
     */
    protected $canSendPolls;

    /**
     * Optional. True, if the user is allowed to send animations, games, stickers and use inline bots 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_other_messages")
     * @Accessor(getter="getCanSendOtherMessages", setter="setCanSendOtherMessages")
     * @Type("bool")
     */
    protected $canSendOtherMessages;

    /**
     * Optional. True, if the user is allowed to add web page previews to their messages 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_add_web_page_previews")
     * @Accessor(getter="getCanAddWebPagePreviews", setter="setCanAddWebPagePreviews")
     * @Type("bool")
     */
    protected $canAddWebPagePreviews;

    /**
     * Optional. True, if the user is allowed to change the chat title, photo and other settings. Ignored in public 
     * supergroups 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_change_info")
     * @Accessor(getter="getCanChangeInfo", setter="setCanChangeInfo")
     * @Type("bool")
     */
    protected $canChangeInfo;

    /**
     * Optional. True, if the user is allowed to invite new users to the chat 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_invite_users")
     * @Accessor(getter="getCanInviteUsers", setter="setCanInviteUsers")
     * @Type("bool")
     */
    protected $canInviteUsers;

    /**
     * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_pin_messages")
     * @Accessor(getter="getCanPinMessages", setter="setCanPinMessages")
     * @Type("bool")
     */
    protected $canPinMessages;

    /**
     * Optional. True, if the user is allowed to create forum topics. If omitted defaults to the value of can_pin_messages 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_manage_topics")
     * @Accessor(getter="getCanManageTopics", setter="setCanManageTopics")
     * @Type("bool")
     */
    protected $canManageTopics;


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
     * @param bool $canSendAudios
     * @return static
     */
    public function setCanSendAudios(bool $canSendAudios): self
    {
        $this->canSendAudios = $canSendAudios;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendAudios(): ?bool
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
     * @return bool|null
     */
    public function getCanSendDocuments(): ?bool
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
     * @return bool|null
     */
    public function getCanSendPhotos(): ?bool
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
     * @return bool|null
     */
    public function getCanSendVideos(): ?bool
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
     * @return bool|null
     */
    public function getCanSendVideoNotes(): ?bool
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
     * @return bool|null
     */
    public function getCanSendVoiceNotes(): ?bool
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

}