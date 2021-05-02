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
            'can_send_media_messages',
            'can_send_polls',
            'can_send_other_messages',
            'can_add_web_page_previews',
            'can_change_info',
            'can_invite_users',
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
            'can_send_messages' => $this->getCanSendMessages(),
            'can_send_media_messages' => $this->getCanSendMediaMessages(),
            'can_send_polls' => $this->getCanSendPolls(),
            'can_send_other_messages' => $this->getCanSendOtherMessages(),
            'can_add_web_page_previews' => $this->getCanAddWebPagePreviews(),
            'can_change_info' => $this->getCanChangeInfo(),
            'can_invite_users' => $this->getCanInviteUsers(),
            'can_pin_messages' => $this->getCanPinMessages(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. True, if the user is allowed to send text messages, contacts, locations and venues 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_messages")
     * @Accessor(getter="getCanSendMessages",setter="setCanSendMessages")
     * @Type("bool")
     */
    protected $canSendMessages;

    /**
     * Optional. True, if the user is allowed to send audios, documents, photos, videos, video notes and voice notes, 
     * implies can_send_messages 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_media_messages")
     * @Accessor(getter="getCanSendMediaMessages",setter="setCanSendMediaMessages")
     * @Type("bool")
     */
    protected $canSendMediaMessages;

    /**
     * Optional. True, if the user is allowed to send polls, implies can_send_messages 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_polls")
     * @Accessor(getter="getCanSendPolls",setter="setCanSendPolls")
     * @Type("bool")
     */
    protected $canSendPolls;

    /**
     * Optional. True, if the user is allowed to send animations, games, stickers and use inline bots, implies 
     * can_send_media_messages 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_other_messages")
     * @Accessor(getter="getCanSendOtherMessages",setter="setCanSendOtherMessages")
     * @Type("bool")
     */
    protected $canSendOtherMessages;

    /**
     * Optional. True, if the user is allowed to add web page previews to their messages, implies can_send_media_messages 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_add_web_page_previews")
     * @Accessor(getter="getCanAddWebPagePreviews",setter="setCanAddWebPagePreviews")
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
     * @Accessor(getter="getCanChangeInfo",setter="setCanChangeInfo")
     * @Type("bool")
     */
    protected $canChangeInfo;

    /**
     * Optional. True, if the user is allowed to invite new users to the chat 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_invite_users")
     * @Accessor(getter="getCanInviteUsers",setter="setCanInviteUsers")
     * @Type("bool")
     */
    protected $canInviteUsers;

    /**
     * Optional. True, if the user is allowed to pin messages. Ignored in public supergroups 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_pin_messages")
     * @Accessor(getter="getCanPinMessages",setter="setCanPinMessages")
     * @Type("bool")
     */
    protected $canPinMessages;


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

}