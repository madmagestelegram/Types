<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatfullinfo
 *
 * This object contains full information about a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatFullInfo extends AbstractType
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
            'accent_color_id',
            'max_reaction_count',
            'photo',
            'active_usernames',
            'birthdate',
            'business_intro',
            'business_location',
            'business_opening_hours',
            'personal_chat',
            'available_reactions',
            'background_custom_emoji_id',
            'profile_accent_color_id',
            'profile_background_custom_emoji_id',
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
            'can_send_gift',
            'can_send_paid_media',
            'slow_mode_delay',
            'unrestrict_boost_count',
            'message_auto_delete_time',
            'has_aggressive_anti_spam_enabled',
            'has_hidden_members',
            'has_protected_content',
            'has_visible_history',
            'sticker_set_name',
            'can_set_sticker_set',
            'custom_emoji_sticker_set_name',
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
            'accent_color_id' => $this->getAccentColorId(),
            'max_reaction_count' => $this->getMaxReactionCount(),
            'photo' => $this->getPhoto(),
            'active_usernames' => $this->getActiveUsernames(),
            'birthdate' => $this->getBirthdate(),
            'business_intro' => $this->getBusinessIntro(),
            'business_location' => $this->getBusinessLocation(),
            'business_opening_hours' => $this->getBusinessOpeningHours(),
            'personal_chat' => $this->getPersonalChat(),
            'available_reactions' => $this->getAvailableReactions(),
            'background_custom_emoji_id' => $this->getBackgroundCustomEmojiId(),
            'profile_accent_color_id' => $this->getProfileAccentColorId(),
            'profile_background_custom_emoji_id' => $this->getProfileBackgroundCustomEmojiId(),
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
            'can_send_gift' => $this->getCanSendGift(),
            'can_send_paid_media' => $this->getCanSendPaidMedia(),
            'slow_mode_delay' => $this->getSlowModeDelay(),
            'unrestrict_boost_count' => $this->getUnrestrictBoostCount(),
            'message_auto_delete_time' => $this->getMessageAutoDeleteTime(),
            'has_aggressive_anti_spam_enabled' => $this->getHasAggressiveAntiSpamEnabled(),
            'has_hidden_members' => $this->getHasHiddenMembers(),
            'has_protected_content' => $this->getHasProtectedContent(),
            'has_visible_history' => $this->getHasVisibleHistory(),
            'sticker_set_name' => $this->getStickerSetName(),
            'can_set_sticker_set' => $this->getCanSetStickerSet(),
            'custom_emoji_sticker_set_name' => $this->getCustomEmojiStickerSetName(),
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
     * Type of the chat, can be either “private”, “group”, “supergroup” or “channel” 
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
     * Identifier of the accent color for the chat name and backgrounds of the chat photo, reply header, and link preview. 
     * See accent colors for more details. 
     *
     * @var int
     * @SerializedName("accent_color_id")
     * @Accessor(getter="getAccentColorId", setter="setAccentColorId")
     * @Type("int")
     */
    protected $accentColorId;

    /**
     * The maximum number of reactions that can be set on a message in the chat 
     *
     * @var int
     * @SerializedName("max_reaction_count")
     * @Accessor(getter="getMaxReactionCount", setter="setMaxReactionCount")
     * @Type("int")
     */
    protected $maxReactionCount;

    /**
     * Optional. Chat photo 
     *
     * @var ChatPhoto|null
     * @SkipWhenEmpty
     * @SerializedName("photo")
     * @Accessor(getter="getPhoto", setter="setPhoto")
     * @Type("MadmagesTelegram\Types\Type\ChatPhoto")
     */
    protected $photo;

    /**
     * Optional. If non-empty, the list of all active chat usernames; for private chats, supergroups and channels 
     *
     * @var string[]|null
     * @SkipWhenEmpty
     * @SerializedName("active_usernames")
     * @Accessor(getter="getActiveUsernames", setter="setActiveUsernames")
     * @Type("array<string>")
     */
    protected $activeUsernames;

    /**
     * Optional. For private chats, the date of birth of the user 
     *
     * @var Birthdate|null
     * @SkipWhenEmpty
     * @SerializedName("birthdate")
     * @Accessor(getter="getBirthdate", setter="setBirthdate")
     * @Type("MadmagesTelegram\Types\Type\Birthdate")
     */
    protected $birthdate;

    /**
     * Optional. For private chats with business accounts, the intro of the business 
     *
     * @var BusinessIntro|null
     * @SkipWhenEmpty
     * @SerializedName("business_intro")
     * @Accessor(getter="getBusinessIntro", setter="setBusinessIntro")
     * @Type("MadmagesTelegram\Types\Type\BusinessIntro")
     */
    protected $businessIntro;

    /**
     * Optional. For private chats with business accounts, the location of the business 
     *
     * @var BusinessLocation|null
     * @SkipWhenEmpty
     * @SerializedName("business_location")
     * @Accessor(getter="getBusinessLocation", setter="setBusinessLocation")
     * @Type("MadmagesTelegram\Types\Type\BusinessLocation")
     */
    protected $businessLocation;

    /**
     * Optional. For private chats with business accounts, the opening hours of the business 
     *
     * @var BusinessOpeningHours|null
     * @SkipWhenEmpty
     * @SerializedName("business_opening_hours")
     * @Accessor(getter="getBusinessOpeningHours", setter="setBusinessOpeningHours")
     * @Type("MadmagesTelegram\Types\Type\BusinessOpeningHours")
     */
    protected $businessOpeningHours;

    /**
     * Optional. For private chats, the personal channel of the user 
     *
     * @var Chat|null
     * @SkipWhenEmpty
     * @SerializedName("personal_chat")
     * @Accessor(getter="getPersonalChat", setter="setPersonalChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $personalChat;

    /**
     * Optional. List of available reactions allowed in the chat. If omitted, then all emoji reactions are allowed. 
     *
     * @var AbstractReactionType[]|null
     * @SkipWhenEmpty
     * @SerializedName("available_reactions")
     * @Accessor(getter="getAvailableReactions", setter="setAvailableReactions")
     * @Type("array<MadmagesTelegram\Types\Type\AbstractReactionType>")
     */
    protected $availableReactions;

    /**
     * Optional. Custom emoji identifier of the emoji chosen by the chat for the reply header and link preview background 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("background_custom_emoji_id")
     * @Accessor(getter="getBackgroundCustomEmojiId", setter="setBackgroundCustomEmojiId")
     * @Type("string")
     */
    protected $backgroundCustomEmojiId;

    /**
     * Optional. Identifier of the accent color for the chat's profile background. See profile accent colors for more 
     * details. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("profile_accent_color_id")
     * @Accessor(getter="getProfileAccentColorId", setter="setProfileAccentColorId")
     * @Type("int")
     */
    protected $profileAccentColorId;

    /**
     * Optional. Custom emoji identifier of the emoji chosen by the chat for its profile background 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("profile_background_custom_emoji_id")
     * @Accessor(getter="getProfileBackgroundCustomEmojiId", setter="setProfileBackgroundCustomEmojiId")
     * @Type("string")
     */
    protected $profileBackgroundCustomEmojiId;

    /**
     * Optional. Custom emoji identifier of the emoji status of the chat or the other party in a private chat 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("emoji_status_custom_emoji_id")
     * @Accessor(getter="getEmojiStatusCustomEmojiId", setter="setEmojiStatusCustomEmojiId")
     * @Type("string")
     */
    protected $emojiStatusCustomEmojiId;

    /**
     * Optional. Expiration date of the emoji status of the chat or the other party in a private chat, in Unix time, if any 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("emoji_status_expiration_date")
     * @Accessor(getter="getEmojiStatusExpirationDate", setter="setEmojiStatusExpirationDate")
     * @Type("int")
     */
    protected $emojiStatusExpirationDate;

    /**
     * Optional. Bio of the other party in a private chat 
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
     * links only in chats with the user 
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
     * private chat 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_restricted_voice_and_video_messages")
     * @Accessor(getter="getHasRestrictedVoiceAndVideoMessages", setter="setHasRestrictedVoiceAndVideoMessages")
     * @Type("bool")
     */
    protected $hasRestrictedVoiceAndVideoMessages;

    /**
     * Optional. True, if users need to join the supergroup before they can send messages 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("join_to_send_messages")
     * @Accessor(getter="getJoinToSendMessages", setter="setJoinToSendMessages")
     * @Type("bool")
     */
    protected $joinToSendMessages;

    /**
     * Optional. True, if all users directly joining the supergroup without using an invite link need to be approved by 
     * supergroup administrators 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("join_by_request")
     * @Accessor(getter="getJoinByRequest", setter="setJoinByRequest")
     * @Type("bool")
     */
    protected $joinByRequest;

    /**
     * Optional. Description, for groups, supergroups and channel chats 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("description")
     * @Accessor(getter="getDescription", setter="setDescription")
     * @Type("string")
     */
    protected $description;

    /**
     * Optional. Primary invite link, for groups, supergroups and channel chats 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("invite_link")
     * @Accessor(getter="getInviteLink", setter="setInviteLink")
     * @Type("string")
     */
    protected $inviteLink;

    /**
     * Optional. The most recent pinned message (by sending date) 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("pinned_message")
     * @Accessor(getter="getPinnedMessage", setter="setPinnedMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $pinnedMessage;

    /**
     * Optional. Default chat member permissions, for groups and supergroups 
     *
     * @var ChatPermissions|null
     * @SkipWhenEmpty
     * @SerializedName("permissions")
     * @Accessor(getter="getPermissions", setter="setPermissions")
     * @Type("MadmagesTelegram\Types\Type\ChatPermissions")
     */
    protected $permissions;

    /**
     * Optional. True, if gifts can be sent to the chat 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_gift")
     * @Accessor(getter="getCanSendGift", setter="setCanSendGift")
     * @Type("bool")
     */
    protected $canSendGift;

    /**
     * Optional. True, if paid media messages can be sent or forwarded to the channel chat. The field is available only for 
     * channel chats. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_send_paid_media")
     * @Accessor(getter="getCanSendPaidMedia", setter="setCanSendPaidMedia")
     * @Type("bool")
     */
    protected $canSendPaidMedia;

    /**
     * Optional. For supergroups, the minimum allowed delay between consecutive messages sent by each unprivileged 
     * user; in seconds 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("slow_mode_delay")
     * @Accessor(getter="getSlowModeDelay", setter="setSlowModeDelay")
     * @Type("int")
     */
    protected $slowModeDelay;

    /**
     * Optional. For supergroups, the minimum number of boosts that a non-administrator user needs to add in order to 
     * ignore slow mode and chat permissions 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("unrestrict_boost_count")
     * @Accessor(getter="getUnrestrictBoostCount", setter="setUnrestrictBoostCount")
     * @Type("int")
     */
    protected $unrestrictBoostCount;

    /**
     * Optional. The time after which all messages sent to the chat will be automatically deleted; in seconds 
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
     * administrators. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_aggressive_anti_spam_enabled")
     * @Accessor(getter="getHasAggressiveAntiSpamEnabled", setter="setHasAggressiveAntiSpamEnabled")
     * @Type("bool")
     */
    protected $hasAggressiveAntiSpamEnabled;

    /**
     * Optional. True, if non-administrators can only get the list of bots and administrators in the chat 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_hidden_members")
     * @Accessor(getter="getHasHiddenMembers", setter="setHasHiddenMembers")
     * @Type("bool")
     */
    protected $hasHiddenMembers;

    /**
     * Optional. True, if messages from the chat can't be forwarded to other chats 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_protected_content")
     * @Accessor(getter="getHasProtectedContent", setter="setHasProtectedContent")
     * @Type("bool")
     */
    protected $hasProtectedContent;

    /**
     * Optional. True, if new chat members will have access to old messages; available only to chat administrators 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_visible_history")
     * @Accessor(getter="getHasVisibleHistory", setter="setHasVisibleHistory")
     * @Type("bool")
     */
    protected $hasVisibleHistory;

    /**
     * Optional. For supergroups, name of the group sticker set 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("sticker_set_name")
     * @Accessor(getter="getStickerSetName", setter="setStickerSetName")
     * @Type("string")
     */
    protected $stickerSetName;

    /**
     * Optional. True, if the bot can change the group sticker set 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_set_sticker_set")
     * @Accessor(getter="getCanSetStickerSet", setter="setCanSetStickerSet")
     * @Type("bool")
     */
    protected $canSetStickerSet;

    /**
     * Optional. For supergroups, the name of the group's custom emoji sticker set. Custom emoji from this set can be used by 
     * all users and bots in the group. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("custom_emoji_sticker_set_name")
     * @Accessor(getter="getCustomEmojiStickerSetName", setter="setCustomEmojiStickerSetName")
     * @Type("string")
     */
    protected $customEmojiStickerSetName;

    /**
     * Optional. Unique identifier for the linked chat, i.e. the discussion group identifier for a channel and vice versa; 
     * for supergroups and channel chats. This identifier may be greater than 32 bits and some programming languages may have 
     * difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type 
     * are safe for storing this identifier. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("linked_chat_id")
     * @Accessor(getter="getLinkedChatId", setter="setLinkedChatId")
     * @Type("int")
     */
    protected $linkedChatId;

    /**
     * Optional. For supergroups, the location to which the supergroup is connected 
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
     * @param int $accentColorId
     * @return static
     */
    public function setAccentColorId(int $accentColorId): self
    {
        $this->accentColorId = $accentColorId;

        return $this;
    }

    /**
     * @return int
     */
    public function getAccentColorId(): int
    {
        return $this->accentColorId;
    }

    /**
     * @param int $maxReactionCount
     * @return static
     */
    public function setMaxReactionCount(int $maxReactionCount): self
    {
        $this->maxReactionCount = $maxReactionCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxReactionCount(): int
    {
        return $this->maxReactionCount;
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
     * @param Birthdate $birthdate
     * @return static
     */
    public function setBirthdate(Birthdate $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return Birthdate|null
     */
    public function getBirthdate(): ?Birthdate
    {
        return $this->birthdate;
    }

    /**
     * @param BusinessIntro $businessIntro
     * @return static
     */
    public function setBusinessIntro(BusinessIntro $businessIntro): self
    {
        $this->businessIntro = $businessIntro;

        return $this;
    }

    /**
     * @return BusinessIntro|null
     */
    public function getBusinessIntro(): ?BusinessIntro
    {
        return $this->businessIntro;
    }

    /**
     * @param BusinessLocation $businessLocation
     * @return static
     */
    public function setBusinessLocation(BusinessLocation $businessLocation): self
    {
        $this->businessLocation = $businessLocation;

        return $this;
    }

    /**
     * @return BusinessLocation|null
     */
    public function getBusinessLocation(): ?BusinessLocation
    {
        return $this->businessLocation;
    }

    /**
     * @param BusinessOpeningHours $businessOpeningHours
     * @return static
     */
    public function setBusinessOpeningHours(BusinessOpeningHours $businessOpeningHours): self
    {
        $this->businessOpeningHours = $businessOpeningHours;

        return $this;
    }

    /**
     * @return BusinessOpeningHours|null
     */
    public function getBusinessOpeningHours(): ?BusinessOpeningHours
    {
        return $this->businessOpeningHours;
    }

    /**
     * @param Chat $personalChat
     * @return static
     */
    public function setPersonalChat(Chat $personalChat): self
    {
        $this->personalChat = $personalChat;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getPersonalChat(): ?Chat
    {
        return $this->personalChat;
    }

    /**
     * @param AbstractReactionType[] $availableReactions
     * @return static
     */
    public function setAvailableReactions(array $availableReactions): self
    {
        $this->availableReactions = $availableReactions;

        return $this;
    }

    /**
     * @return AbstractReactionType[]|null
     */
    public function getAvailableReactions(): ?array
    {
        return $this->availableReactions;
    }

    /**
     * @param string $backgroundCustomEmojiId
     * @return static
     */
    public function setBackgroundCustomEmojiId(string $backgroundCustomEmojiId): self
    {
        $this->backgroundCustomEmojiId = $backgroundCustomEmojiId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBackgroundCustomEmojiId(): ?string
    {
        return $this->backgroundCustomEmojiId;
    }

    /**
     * @param int $profileAccentColorId
     * @return static
     */
    public function setProfileAccentColorId(int $profileAccentColorId): self
    {
        $this->profileAccentColorId = $profileAccentColorId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProfileAccentColorId(): ?int
    {
        return $this->profileAccentColorId;
    }

    /**
     * @param string $profileBackgroundCustomEmojiId
     * @return static
     */
    public function setProfileBackgroundCustomEmojiId(string $profileBackgroundCustomEmojiId): self
    {
        $this->profileBackgroundCustomEmojiId = $profileBackgroundCustomEmojiId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProfileBackgroundCustomEmojiId(): ?string
    {
        return $this->profileBackgroundCustomEmojiId;
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
     * @param bool $canSendGift
     * @return static
     */
    public function setCanSendGift(bool $canSendGift): self
    {
        $this->canSendGift = $canSendGift;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendGift(): ?bool
    {
        return $this->canSendGift;
    }

    /**
     * @param bool $canSendPaidMedia
     * @return static
     */
    public function setCanSendPaidMedia(bool $canSendPaidMedia): self
    {
        $this->canSendPaidMedia = $canSendPaidMedia;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSendPaidMedia(): ?bool
    {
        return $this->canSendPaidMedia;
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
     * @param int $unrestrictBoostCount
     * @return static
     */
    public function setUnrestrictBoostCount(int $unrestrictBoostCount): self
    {
        $this->unrestrictBoostCount = $unrestrictBoostCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnrestrictBoostCount(): ?int
    {
        return $this->unrestrictBoostCount;
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
     * @param bool $hasVisibleHistory
     * @return static
     */
    public function setHasVisibleHistory(bool $hasVisibleHistory): self
    {
        $this->hasVisibleHistory = $hasVisibleHistory;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasVisibleHistory(): ?bool
    {
        return $this->hasVisibleHistory;
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
     * @param string $customEmojiStickerSetName
     * @return static
     */
    public function setCustomEmojiStickerSetName(string $customEmojiStickerSetName): self
    {
        $this->customEmojiStickerSetName = $customEmojiStickerSetName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomEmojiStickerSetName(): ?string
    {
        return $this->customEmojiStickerSetName;
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