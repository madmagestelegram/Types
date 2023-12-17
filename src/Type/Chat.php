<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chat
 *
 * This object represents a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Chat extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'id',
            'type',
            'title',
            'username',
            'first_name',
            'last_name',
            'is_forum',
            'photo',
            'active_usernames',
            'emoji_status_custom_emoji_id',
            'emoji_status_expiration_date',
            'bio',
            'has_private_forwards',
            'has_restricted_voice_and_video_messages',
            'join_to_send_messages',
            'join_by_request',
            'description',
            'invite_link',
            'pinned_message',
            'permissions',
            'slow_mode_delay',
            'message_auto_delete_time',
            'has_aggressive_anti_spam_enabled',
            'has_hidden_members',
            'has_protected_content',
            'sticker_set_name',
            'can_set_sticker_set',
            'linked_chat_id',
            'location',
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
            'id' => $this->getId(),
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'username' => $this->getUsername(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'is_forum' => $this->getIsForum(),
            'photo' => $this->getPhoto(),
            'active_usernames' => $this->getActiveUsernames(),
            'emoji_status_custom_emoji_id' => $this->getEmojiStatusCustomEmojiId(),
            'emoji_status_expiration_date' => $this->getEmojiStatusExpirationDate(),
            'bio' => $this->getBio(),
            'has_private_forwards' => $this->getHasPrivateForwards(),
            'has_restricted_voice_and_video_messages' => $this->getHasRestrictedVoiceAndVideoMessages(),
            'join_to_send_messages' => $this->getJoinToSendMessages(),
            'join_by_request' => $this->getJoinByRequest(),
            'description' => $this->getDescription(),
            'invite_link' => $this->getInviteLink(),
            'pinned_message' => $this->getPinnedMessage(),
            'permissions' => $this->getPermissions(),
            'slow_mode_delay' => $this->getSlowModeDelay(),
            'message_auto_delete_time' => $this->getMessageAutoDeleteTime(),
            'has_aggressive_anti_spam_enabled' => $this->getHasAggressiveAntiSpamEnabled(),
            'has_hidden_members' => $this->getHasHiddenMembers(),
            'has_protected_content' => $this->getHasProtectedContent(),
            'sticker_set_name' => $this->getStickerSetName(),
            'can_set_sticker_set' => $this->getCanSetStickerSet(),
            'linked_chat_id' => $this->getLinkedChatId(),
            'location' => $this->getLocation(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier for this chat. This number may have more than 32 significant bits and some programming languages 
     * may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit 
     * integer or double-precision float type are safe for storing this identifier. 
     *
     * @var int
     * @SerializedName("id")
     * @Accessor(getter="getId", setter="setId")
     * @Type("int")
     */
    protected $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Optional. Title, for supergroups, channels and group chats 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Username, for private chats, supergroups and channels if available 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("username")
     * @Accessor(getter="getUsername", setter="setUsername")
     * @Type("string")
     */
    protected $username;

    /**
     * Optional. First name of the other party in a private chat 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("first_name")
     * @Accessor(getter="getFirstName", setter="setFirstName")
     * @Type("string")
     */
    protected $firstName;

    /**
     * Optional. Last name of the other party in a private chat 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("last_name")
     * @Accessor(getter="getLastName", setter="setLastName")
     * @Type("string")
     */
    protected $lastName;

    /**
     * Optional. True, if the supergroup chat is a forum (has topics enabled) 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_forum")
     * @Accessor(getter="getIsForum", setter="setIsForum")
     * @Type("bool")
     */
    protected $isForum;

    /**
     * Optional. Chat photo. Returned only in getChat. 
     *
     * @var ChatPhoto|null
     * @SkipWhenEmpty
     * @SerializedName("photo")
     * @Accessor(getter="getPhoto", setter="setPhoto")
     * @Type("MadmagesTelegram\Types\Type\ChatPhoto")
     */
    protected $photo;

    /**
     * Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels. 
     * Returned only in getChat. 
     *
     * @var string[]|null
     * @SkipWhenEmpty
     * @SerializedName("active_usernames")
     * @Accessor(getter="getActiveUsernames", setter="setActiveUsernames")
     * @Type("array<string>")
     */
    protected $activeUsernames;

    /**
     * Optional. Custom emoji identifier of emoji status of the other party in a private chat. Returned only in getChat. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("emoji_status_custom_emoji_id")
     * @Accessor(getter="getEmojiStatusCustomEmojiId", setter="setEmojiStatusCustomEmojiId")
     * @Type("string")
     */
    protected $emojiStatusCustomEmojiId;

    /**
     * Optional. Expiration date of the emoji status of the other party in a private chat in Unix time, if any. Returned only 
     * in getChat. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("emoji_status_expiration_date")
     * @Accessor(getter="getEmojiStatusExpirationDate", setter="setEmojiStatusExpirationDate")
     * @Type("int")
     */
    protected $emojiStatusExpirationDate;

    /**
     * Optional. Bio of the other party in a private chat. Returned only in getChat. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("bio")
     * @Accessor(getter="getBio", setter="setBio")
     * @Type("string")
     */
    protected $bio;

    /**
     * Optional. True, if privacy settings of the other party in the private chat allows to use tg://user?id= 
     * links only in chats with the user. Returned only in getChat. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_private_forwards")
     * @Accessor(getter="getHasPrivateForwards", setter="setHasPrivateForwards")
     * @Type("bool")
     */
    protected $hasPrivateForwards;

    /**
     * Optional. True, if the privacy settings of the other party restrict sending voice and video note messages in the 
     * private chat. Returned only in getChat. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_restricted_voice_and_video_messages")
     * @Accessor(getter="getHasRestrictedVoiceAndVideoMessages", setter="setHasRestrictedVoiceAndVideoMessages")
     * @Type("bool")
     */
    protected $hasRestrictedVoiceAndVideoMessages;

    /**
     * Optional. True, if users need to join the supergroup before they can send messages. Returned only in getChat. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("join_to_send_messages")
     * @Accessor(getter="getJoinToSendMessages", setter="setJoinToSendMessages")
     * @Type("bool")
     */
    protected $joinToSendMessages;

    /**
     * Optional. True, if all users directly joining the supergroup need to be approved by supergroup administrators. 
     * Returned only in getChat. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("join_by_request")
     * @Accessor(getter="getJoinByRequest", setter="setJoinByRequest")
     * @Type("bool")
     */
    protected $joinByRequest;

    /**
     * Optional. Description, for groups, supergroups and channel chats. Returned only in getChat. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("description")
     * @Accessor(getter="getDescription", setter="setDescription")
     * @Type("string")
     */
    protected $description;

    /**
     * Optional. Primary invite link, for groups, supergroups and channel chats. Returned only in getChat. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("invite_link")
     * @Accessor(getter="getInviteLink", setter="setInviteLink")
     * @Type("string")
     */
    protected $inviteLink;

    /**
     * Optional. The most recent pinned message (by sending date). Returned only in getChat. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("pinned_message")
     * @Accessor(getter="getPinnedMessage", setter="setPinnedMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $pinnedMessage;

    /**
     * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat. 
     *
     * @var ChatPermissions|null
     * @SkipWhenEmpty
     * @SerializedName("permissions")
     * @Accessor(getter="getPermissions", setter="setPermissions")
     * @Type("MadmagesTelegram\Types\Type\ChatPermissions")
     */
    protected $permissions;

    /**
     * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unpriviledged 
     * user; in seconds. Returned only in getChat. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("slow_mode_delay")
     * @Accessor(getter="getSlowModeDelay", setter="setSlowModeDelay")
     * @Type("int")
     */
    protected $slowModeDelay;

    /**
     * Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds. Returned 
     * only in getChat. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("message_auto_delete_time")
     * @Accessor(getter="getMessageAutoDeleteTime", setter="setMessageAutoDeleteTime")
     * @Type("int")
     */
    protected $messageAutoDeleteTime;

    /**
     * Optional. True, if aggressive anti-spam checks are enabled in the supergroup. The field is only available to chat 
     * administrators. Returned only in getChat. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_aggressive_anti_spam_enabled")
     * @Accessor(getter="getHasAggressiveAntiSpamEnabled", setter="setHasAggressiveAntiSpamEnabled")
     * @Type("bool")
     */
    protected $hasAggressiveAntiSpamEnabled;

    /**
     * Optional. True, if non-administrators can only get the list of bots and administrators in the chat. Returned only in 
     * getChat. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_hidden_members")
     * @Accessor(getter="getHasHiddenMembers", setter="setHasHiddenMembers")
     * @Type("bool")
     */
    protected $hasHiddenMembers;

    /**
     * Optional. True, if messages from the chat can't be forwarded to other chats. Returned only in getChat. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_protected_content")
     * @Accessor(getter="getHasProtectedContent", setter="setHasProtectedContent")
     * @Type("bool")
     */
    protected $hasProtectedContent;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("sticker_set_name")
     * @Accessor(getter="getStickerSetName", setter="setStickerSetName")
     * @Type("string")
     */
    protected $stickerSetName;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_set_sticker_set")
     * @Accessor(getter="getCanSetStickerSet", setter="setCanSetStickerSet")
     * @Type("bool")
     */
    protected $canSetStickerSet;

    /**
     * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; 
     * for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have 
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type 
     * are safe for storing this identifier. Returned only in getChat. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("linked_chat_id")
     * @Accessor(getter="getLinkedChatId", setter="setLinkedChatId")
     * @Type("int")
     */
    protected $linkedChatId;

    /**
     * Optional. For supergroups, the location to which the supergroup is connected. Returned only in getChat. 
     *
     * @var ChatLocation|null
     * @SkipWhenEmpty
     * @SerializedName("location")
     * @Accessor(getter="getLocation", setter="setLocation")
     * @Type("MadmagesTelegram\Types\Type\ChatLocation")
     */
    protected $location;


    /**
     * @param int $id
     * @return static
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $username
     * @return static
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $firstName
     * @return static
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     * @return static
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param bool $isForum
     * @return static
     */
    public function setIsForum(bool $isForum): self
    {
        $this->isForum = $isForum;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsForum(): ?bool
    {
        return $this->isForum;
    }

    /**
     * @param ChatPhoto $photo
     * @return static
     */
    public function setPhoto(ChatPhoto $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return ChatPhoto|null
     */
    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    /**
     * @param string[] $activeUsernames
     * @return static
     */
    public function setActiveUsernames(array $activeUsernames): self
    {
        $this->activeUsernames = $activeUsernames;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getActiveUsernames(): ?array
    {
        return $this->activeUsernames;
    }

    /**
     * @param string $emojiStatusCustomEmojiId
     * @return static
     */
    public function setEmojiStatusCustomEmojiId(string $emojiStatusCustomEmojiId): self
    {
        $this->emojiStatusCustomEmojiId = $emojiStatusCustomEmojiId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmojiStatusCustomEmojiId(): ?string
    {
        return $this->emojiStatusCustomEmojiId;
    }

    /**
     * @param int $emojiStatusExpirationDate
     * @return static
     */
    public function setEmojiStatusExpirationDate(int $emojiStatusExpirationDate): self
    {
        $this->emojiStatusExpirationDate = $emojiStatusExpirationDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEmojiStatusExpirationDate(): ?int
    {
        return $this->emojiStatusExpirationDate;
    }

    /**
     * @param string $bio
     * @return static
     */
    public function setBio(string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBio(): ?string
    {
        return $this->bio;
    }

    /**
     * @param bool $hasPrivateForwards
     * @return static
     */
    public function setHasPrivateForwards(bool $hasPrivateForwards): self
    {
        $this->hasPrivateForwards = $hasPrivateForwards;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasPrivateForwards(): ?bool
    {
        return $this->hasPrivateForwards;
    }

    /**
     * @param bool $hasRestrictedVoiceAndVideoMessages
     * @return static
     */
    public function setHasRestrictedVoiceAndVideoMessages(bool $hasRestrictedVoiceAndVideoMessages): self
    {
        $this->hasRestrictedVoiceAndVideoMessages = $hasRestrictedVoiceAndVideoMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasRestrictedVoiceAndVideoMessages(): ?bool
    {
        return $this->hasRestrictedVoiceAndVideoMessages;
    }

    /**
     * @param bool $joinToSendMessages
     * @return static
     */
    public function setJoinToSendMessages(bool $joinToSendMessages): self
    {
        $this->joinToSendMessages = $joinToSendMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getJoinToSendMessages(): ?bool
    {
        return $this->joinToSendMessages;
    }

    /**
     * @param bool $joinByRequest
     * @return static
     */
    public function setJoinByRequest(bool $joinByRequest): self
    {
        $this->joinByRequest = $joinByRequest;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getJoinByRequest(): ?bool
    {
        return $this->joinByRequest;
    }

    /**
     * @param string $description
     * @return static
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $inviteLink
     * @return static
     */
    public function setInviteLink(string $inviteLink): self
    {
        $this->inviteLink = $inviteLink;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }

    /**
     * @param Message $pinnedMessage
     * @return static
     */
    public function setPinnedMessage(Message $pinnedMessage): self
    {
        $this->pinnedMessage = $pinnedMessage;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @param ChatPermissions $permissions
     * @return static
     */
    public function setPermissions(ChatPermissions $permissions): self
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * @return ChatPermissions|null
     */
    public function getPermissions(): ?ChatPermissions
    {
        return $this->permissions;
    }

    /**
     * @param int $slowModeDelay
     * @return static
     */
    public function setSlowModeDelay(int $slowModeDelay): self
    {
        $this->slowModeDelay = $slowModeDelay;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSlowModeDelay(): ?int
    {
        return $this->slowModeDelay;
    }

    /**
     * @param int $messageAutoDeleteTime
     * @return static
     */
    public function setMessageAutoDeleteTime(int $messageAutoDeleteTime): self
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageAutoDeleteTime(): ?int
    {
        return $this->messageAutoDeleteTime;
    }

    /**
     * @param bool $hasAggressiveAntiSpamEnabled
     * @return static
     */
    public function setHasAggressiveAntiSpamEnabled(bool $hasAggressiveAntiSpamEnabled): self
    {
        $this->hasAggressiveAntiSpamEnabled = $hasAggressiveAntiSpamEnabled;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasAggressiveAntiSpamEnabled(): ?bool
    {
        return $this->hasAggressiveAntiSpamEnabled;
    }

    /**
     * @param bool $hasHiddenMembers
     * @return static
     */
    public function setHasHiddenMembers(bool $hasHiddenMembers): self
    {
        $this->hasHiddenMembers = $hasHiddenMembers;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasHiddenMembers(): ?bool
    {
        return $this->hasHiddenMembers;
    }

    /**
     * @param bool $hasProtectedContent
     * @return static
     */
    public function setHasProtectedContent(bool $hasProtectedContent): self
    {
        $this->hasProtectedContent = $hasProtectedContent;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasProtectedContent(): ?bool
    {
        return $this->hasProtectedContent;
    }

    /**
     * @param string $stickerSetName
     * @return static
     */
    public function setStickerSetName(string $stickerSetName): self
    {
        $this->stickerSetName = $stickerSetName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStickerSetName(): ?string
    {
        return $this->stickerSetName;
    }

    /**
     * @param bool $canSetStickerSet
     * @return static
     */
    public function setCanSetStickerSet(bool $canSetStickerSet): self
    {
        $this->canSetStickerSet = $canSetStickerSet;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSetStickerSet(): ?bool
    {
        return $this->canSetStickerSet;
    }

    /**
     * @param int $linkedChatId
     * @return static
     */
    public function setLinkedChatId(int $linkedChatId): self
    {
        $this->linkedChatId = $linkedChatId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLinkedChatId(): ?int
    {
        return $this->linkedChatId;
    }

    /**
     * @param ChatLocation $location
     * @return static
     */
    public function setLocation(ChatLocation $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return ChatLocation|null
     */
    public function getLocation(): ?ChatLocation
    {
        return $this->location;
    }

}