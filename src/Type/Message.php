<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#message
 *
 * This object represents a message. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Message extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'message_id',
            'from',
            'date',
            'chat',
            'forward_from',
            'forward_from_chat',
            'forward_from_message_id',
            'forward_signature',
            'forward_sender_name',
            'forward_date',
            'reply_to_message',
            'edit_date',
            'media_group_id',
            'author_signature',
            'text',
            'entities',
            'caption_entities',
            'audio',
            'document',
            'animation',
            'game',
            'photo',
            'sticker',
            'video',
            'voice',
            'video_note',
            'caption',
            'contact',
            'location',
            'venue',
            'poll',
            'new_chat_members',
            'left_chat_member',
            'new_chat_title',
            'new_chat_photo',
            'delete_chat_photo',
            'group_chat_created',
            'supergroup_chat_created',
            'channel_chat_created',
            'migrate_to_chat_id',
            'migrate_from_chat_id',
            'pinned_message',
            'invoice',
            'successful_payment',
            'connected_website',
            'passport_data',
            'reply_markup',
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
            'message_id' => $this->getMessageId(),
            'from' => $this->getFrom(),
            'date' => $this->getDate(),
            'chat' => $this->getChat(),
            'forward_from' => $this->getForwardFrom(),
            'forward_from_chat' => $this->getForwardFromChat(),
            'forward_from_message_id' => $this->getForwardFromMessageId(),
            'forward_signature' => $this->getForwardSignature(),
            'forward_sender_name' => $this->getForwardSenderName(),
            'forward_date' => $this->getForwardDate(),
            'reply_to_message' => $this->getReplyToMessage(),
            'edit_date' => $this->getEditDate(),
            'media_group_id' => $this->getMediaGroupId(),
            'author_signature' => $this->getAuthorSignature(),
            'text' => $this->getText(),
            'entities' => $this->getEntities(),
            'caption_entities' => $this->getCaptionEntities(),
            'audio' => $this->getAudio(),
            'document' => $this->getDocument(),
            'animation' => $this->getAnimation(),
            'game' => $this->getGame(),
            'photo' => $this->getPhoto(),
            'sticker' => $this->getSticker(),
            'video' => $this->getVideo(),
            'voice' => $this->getVoice(),
            'video_note' => $this->getVideoNote(),
            'caption' => $this->getCaption(),
            'contact' => $this->getContact(),
            'location' => $this->getLocation(),
            'venue' => $this->getVenue(),
            'poll' => $this->getPoll(),
            'new_chat_members' => $this->getNewChatMembers(),
            'left_chat_member' => $this->getLeftChatMember(),
            'new_chat_title' => $this->getNewChatTitle(),
            'new_chat_photo' => $this->getNewChatPhoto(),
            'delete_chat_photo' => $this->getDeleteChatPhoto(),
            'group_chat_created' => $this->getGroupChatCreated(),
            'supergroup_chat_created' => $this->getSupergroupChatCreated(),
            'channel_chat_created' => $this->getChannelChatCreated(),
            'migrate_to_chat_id' => $this->getMigrateToChatId(),
            'migrate_from_chat_id' => $this->getMigrateFromChatId(),
            'pinned_message' => $this->getPinnedMessage(),
            'invoice' => $this->getInvoice(),
            'successful_payment' => $this->getSuccessfulPayment(),
            'connected_website' => $this->getConnectedWebsite(),
            'passport_data' => $this->getPassportData(),
            'reply_markup' => $this->getReplyMarkup(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Unique message identifier inside this chat 
     *
     * @var int
     * @SerializedName("message_id")
     * @Accessor(getter="getMessageId",setter="setMessageId")
     * @Type("int")
     */
    protected $messageId;

    /**
     * Optional. Sender, empty for messages sent to channels 
     *
     * @var User|null
     * @SkipWhenEmpty
     * @SerializedName("from")
     * @Accessor(getter="getFrom",setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Date the message was sent in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate",setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * Conversation the message belongs to 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat",setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * Optional. For forwarded messages, sender of the original message 
     *
     * @var User|null
     * @SkipWhenEmpty
     * @SerializedName("forward_from")
     * @Accessor(getter="getForwardFrom",setter="setForwardFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $forwardFrom;

    /**
     * Optional. For messages forwarded from channels, information about the original channel 
     *
     * @var Chat|null
     * @SkipWhenEmpty
     * @SerializedName("forward_from_chat")
     * @Accessor(getter="getForwardFromChat",setter="setForwardFromChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $forwardFromChat;

    /**
     * Optional. For messages forwarded from channels, identifier of the original message in the channel 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("forward_from_message_id")
     * @Accessor(getter="getForwardFromMessageId",setter="setForwardFromMessageId")
     * @Type("int")
     */
    protected $forwardFromMessageId;

    /**
     * Optional. For messages forwarded from channels, signature of the post author if present 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("forward_signature")
     * @Accessor(getter="getForwardSignature",setter="setForwardSignature")
     * @Type("string")
     */
    protected $forwardSignature;

    /**
     * Optional. Sender's name for messages forwarded from users who disallow adding a link to their account in forwarded 
     * messages 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("forward_sender_name")
     * @Accessor(getter="getForwardSenderName",setter="setForwardSenderName")
     * @Type("string")
     */
    protected $forwardSenderName;

    /**
     * Optional. For forwarded messages, date the original message was sent in Unix time 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("forward_date")
     * @Accessor(getter="getForwardDate",setter="setForwardDate")
     * @Type("int")
     */
    protected $forwardDate;

    /**
     * Optional. For replies, the original message. Note that the Message object in this field will not contain further 
     * reply_to_message fields even if it itself is a reply. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("reply_to_message")
     * @Accessor(getter="getReplyToMessage",setter="setReplyToMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $replyToMessage;

    /**
     * Optional. Date the message was last edited in Unix time 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("edit_date")
     * @Accessor(getter="getEditDate",setter="setEditDate")
     * @Type("int")
     */
    protected $editDate;

    /**
     * Optional. The unique identifier of a media message group this message belongs to 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("media_group_id")
     * @Accessor(getter="getMediaGroupId",setter="setMediaGroupId")
     * @Type("string")
     */
    protected $mediaGroupId;

    /**
     * Optional. Signature of the post author for messages in channels 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("author_signature")
     * @Accessor(getter="getAuthorSignature",setter="setAuthorSignature")
     * @Type("string")
     */
    protected $authorSignature;

    /**
     * Optional. For text messages, the actual UTF-8 text of the message, 0-4096 characters 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("text")
     * @Accessor(getter="getText",setter="setText")
     * @Type("string")
     */
    protected $text;

    /**
     * Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("entities")
     * @Accessor(getter="getEntities",setter="setEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $entities;

    /**
     * Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the 
     * caption 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("caption_entities")
     * @Accessor(getter="getCaptionEntities",setter="setCaptionEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $captionEntities;

    /**
     * Optional. Message is an audio file, information about the file 
     *
     * @var Audio|null
     * @SkipWhenEmpty
     * @SerializedName("audio")
     * @Accessor(getter="getAudio",setter="setAudio")
     * @Type("MadmagesTelegram\Types\Type\Audio")
     */
    protected $audio;

    /**
     * Optional. Message is a general file, information about the file 
     *
     * @var Document|null
     * @SkipWhenEmpty
     * @SerializedName("document")
     * @Accessor(getter="getDocument",setter="setDocument")
     * @Type("MadmagesTelegram\Types\Type\Document")
     */
    protected $document;

    /**
     * Optional. Message is an animation, information about the animation. For backward compatibility, when this field 
     * is set, the document field will also be set 
     *
     * @var Animation|null
     * @SkipWhenEmpty
     * @SerializedName("animation")
     * @Accessor(getter="getAnimation",setter="setAnimation")
     * @Type("MadmagesTelegram\Types\Type\Animation")
     */
    protected $animation;

    /**
     * Optional. Message is a game, information about the game. More about games » 
     *
     * @var Game|null
     * @SkipWhenEmpty
     * @SerializedName("game")
     * @Accessor(getter="getGame",setter="setGame")
     * @Type("MadmagesTelegram\Types\Type\Game")
     */
    protected $game;

    /**
     * Optional. Message is a photo, available sizes of the photo 
     *
     * @var PhotoSize[]|null
     * @SkipWhenEmpty
     * @SerializedName("photo")
     * @Accessor(getter="getPhoto",setter="setPhoto")
     * @Type("array<MadmagesTelegram\Types\Type\PhotoSize>")
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker 
     *
     * @var Sticker|null
     * @SkipWhenEmpty
     * @SerializedName("sticker")
     * @Accessor(getter="getSticker",setter="setSticker")
     * @Type("MadmagesTelegram\Types\Type\Sticker")
     */
    protected $sticker;

    /**
     * Optional. Message is a video, information about the video 
     *
     * @var Video|null
     * @SkipWhenEmpty
     * @SerializedName("video")
     * @Accessor(getter="getVideo",setter="setVideo")
     * @Type("MadmagesTelegram\Types\Type\Video")
     */
    protected $video;

    /**
     * Optional. Message is a voice message, information about the file 
     *
     * @var Voice|null
     * @SkipWhenEmpty
     * @SerializedName("voice")
     * @Accessor(getter="getVoice",setter="setVoice")
     * @Type("MadmagesTelegram\Types\Type\Voice")
     */
    protected $voice;

    /**
     * Optional. Message is a video note, information about the video message 
     *
     * @var VideoNote|null
     * @SkipWhenEmpty
     * @SerializedName("video_note")
     * @Accessor(getter="getVideoNote",setter="setVideoNote")
     * @Type("MadmagesTelegram\Types\Type\VideoNote")
     */
    protected $videoNote;

    /**
     * Optional. Caption for the animation, audio, document, photo, video or voice, 0-1024 characters 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption",setter="setCaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Message is a shared contact, information about the contact 
     *
     * @var Contact|null
     * @SkipWhenEmpty
     * @SerializedName("contact")
     * @Accessor(getter="getContact",setter="setContact")
     * @Type("MadmagesTelegram\Types\Type\Contact")
     */
    protected $contact;

    /**
     * Optional. Message is a shared location, information about the location 
     *
     * @var Location|null
     * @SkipWhenEmpty
     * @SerializedName("location")
     * @Accessor(getter="getLocation",setter="setLocation")
     * @Type("MadmagesTelegram\Types\Type\Location")
     */
    protected $location;

    /**
     * Optional. Message is a venue, information about the venue 
     *
     * @var Venue|null
     * @SkipWhenEmpty
     * @SerializedName("venue")
     * @Accessor(getter="getVenue",setter="setVenue")
     * @Type("MadmagesTelegram\Types\Type\Venue")
     */
    protected $venue;

    /**
     * Optional. Message is a native poll, information about the poll 
     *
     * @var Poll|null
     * @SkipWhenEmpty
     * @SerializedName("poll")
     * @Accessor(getter="getPoll",setter="setPoll")
     * @Type("MadmagesTelegram\Types\Type\Poll")
     */
    protected $poll;

    /**
     * Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one 
     * of these members) 
     *
     * @var User[]|null
     * @SkipWhenEmpty
     * @SerializedName("new_chat_members")
     * @Accessor(getter="getNewChatMembers",setter="setNewChatMembers")
     * @Type("array<MadmagesTelegram\Types\Type\User>")
     */
    protected $newChatMembers;

    /**
     * Optional. A member was removed from the group, information about them (this member may be the bot itself) 
     *
     * @var User|null
     * @SkipWhenEmpty
     * @SerializedName("left_chat_member")
     * @Accessor(getter="getLeftChatMember",setter="setLeftChatMember")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $leftChatMember;

    /**
     * Optional. A chat title was changed to this value 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("new_chat_title")
     * @Accessor(getter="getNewChatTitle",setter="setNewChatTitle")
     * @Type("string")
     */
    protected $newChatTitle;

    /**
     * Optional. A chat photo was change to this value 
     *
     * @var PhotoSize[]|null
     * @SkipWhenEmpty
     * @SerializedName("new_chat_photo")
     * @Accessor(getter="getNewChatPhoto",setter="setNewChatPhoto")
     * @Type("array<MadmagesTelegram\Types\Type\PhotoSize>")
     */
    protected $newChatPhoto;

    /**
     * Optional. Service message: the chat photo was deleted 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("delete_chat_photo")
     * @Accessor(getter="getDeleteChatPhoto",setter="setDeleteChatPhoto")
     * @Type("bool")
     */
    protected $deleteChatPhoto;

    /**
     * Optional. Service message: the group has been created 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("group_chat_created")
     * @Accessor(getter="getGroupChatCreated",setter="setGroupChatCreated")
     * @Type("bool")
     */
    protected $groupChatCreated;

    /**
     * Optional. Service message: the supergroup has been created. This field can‘t be received in a message coming 
     * through updates, because bot can’t be a member of a supergroup when it is created. It can only be found in reply_to_message 
     * if someone replies to a very first message in a directly created supergroup. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("supergroup_chat_created")
     * @Accessor(getter="getSupergroupChatCreated",setter="setSupergroupChatCreated")
     * @Type("bool")
     */
    protected $supergroupChatCreated;

    /**
     * Optional. Service message: the channel has been created. This field can‘t be received in a message coming through 
     * updates, because bot can’t be a member of a channel when it is created. It can only be found in reply_to_message if someone 
     * replies to a very first message in a channel. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("channel_chat_created")
     * @Accessor(getter="getChannelChatCreated",setter="setChannelChatCreated")
     * @Type("bool")
     */
    protected $channelChatCreated;

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier. This number may be greater than 
     * 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 
     * 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("migrate_to_chat_id")
     * @Accessor(getter="getMigrateToChatId",setter="setMigrateToChatId")
     * @Type("int")
     */
    protected $migrateToChatId;

    /**
     * Optional. The supergroup has been migrated from a group with the specified identifier. This number may be greater 
     * than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller 
     * than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("migrate_from_chat_id")
     * @Accessor(getter="getMigrateFromChatId",setter="setMigrateFromChatId")
     * @Type("int")
     */
    protected $migrateFromChatId;

    /**
     * Optional. Specified message was pinned. Note that the Message object in this field will not contain further 
     * reply_to_message fields even if it is itself a reply. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("pinned_message")
     * @Accessor(getter="getPinnedMessage",setter="setPinnedMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $pinnedMessage;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice. More about payments » 
     *
     * @var Invoice|null
     * @SkipWhenEmpty
     * @SerializedName("invoice")
     * @Accessor(getter="getInvoice",setter="setInvoice")
     * @Type("MadmagesTelegram\Types\Type\Invoice")
     */
    protected $invoice;

    /**
     * Optional. Message is a service message about a successful payment, information about the payment. More about 
     * payments » 
     *
     * @var SuccessfulPayment|null
     * @SkipWhenEmpty
     * @SerializedName("successful_payment")
     * @Accessor(getter="getSuccessfulPayment",setter="setSuccessfulPayment")
     * @Type("MadmagesTelegram\Types\Type\SuccessfulPayment")
     */
    protected $successfulPayment;

    /**
     * Optional. The domain name of the website on which the user has logged in. More about Telegram Login » 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("connected_website")
     * @Accessor(getter="getConnectedWebsite",setter="setConnectedWebsite")
     * @Type("string")
     */
    protected $connectedWebsite;

    /**
     * Optional. Telegram Passport data 
     *
     * @var PassportData|null
     * @SkipWhenEmpty
     * @SerializedName("passport_data")
     * @Accessor(getter="getPassportData",setter="setPassportData")
     * @Type("MadmagesTelegram\Types\Type\PassportData")
     */
    protected $passportData;

    /**
     * Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons. 
     *
     * @var InlineKeyboardMarkup|null
     * @SkipWhenEmpty
     * @SerializedName("reply_markup")
     * @Accessor(getter="getReplyMarkup",setter="setReplyMarkup")
     * @Type("MadmagesTelegram\Types\Type\InlineKeyboardMarkup")
     */
    protected $replyMarkup;


    /**
     * @param int $messageId
     * @return static
     */
    public function setMessageId(int $messageId): self
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
    }

    /**
     * @param User $from
     * @return static
     */
    public function setFrom(User $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getFrom(): ?User
    {
        return $this->from;
    }

    /**
     * @param int $date
     * @return static
     */
    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param Chat $chat
     * @return static
     */
    public function setChat(Chat $chat): self
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

    /**
     * @param User $forwardFrom
     * @return static
     */
    public function setForwardFrom(User $forwardFrom): self
    {
        $this->forwardFrom = $forwardFrom;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getForwardFrom(): ?User
    {
        return $this->forwardFrom;
    }

    /**
     * @param Chat $forwardFromChat
     * @return static
     */
    public function setForwardFromChat(Chat $forwardFromChat): self
    {
        $this->forwardFromChat = $forwardFromChat;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getForwardFromChat(): ?Chat
    {
        return $this->forwardFromChat;
    }

    /**
     * @param int $forwardFromMessageId
     * @return static
     */
    public function setForwardFromMessageId(int $forwardFromMessageId): self
    {
        $this->forwardFromMessageId = $forwardFromMessageId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForwardFromMessageId(): ?int
    {
        return $this->forwardFromMessageId;
    }

    /**
     * @param string $forwardSignature
     * @return static
     */
    public function setForwardSignature(string $forwardSignature): self
    {
        $this->forwardSignature = $forwardSignature;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getForwardSignature(): ?string
    {
        return $this->forwardSignature;
    }

    /**
     * @param string $forwardSenderName
     * @return static
     */
    public function setForwardSenderName(string $forwardSenderName): self
    {
        $this->forwardSenderName = $forwardSenderName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getForwardSenderName(): ?string
    {
        return $this->forwardSenderName;
    }

    /**
     * @param int $forwardDate
     * @return static
     */
    public function setForwardDate(int $forwardDate): self
    {
        $this->forwardDate = $forwardDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getForwardDate(): ?int
    {
        return $this->forwardDate;
    }

    /**
     * @param Message $replyToMessage
     * @return static
     */
    public function setReplyToMessage(Message $replyToMessage): self
    {
        $this->replyToMessage = $replyToMessage;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getReplyToMessage(): ?Message
    {
        return $this->replyToMessage;
    }

    /**
     * @param int $editDate
     * @return static
     */
    public function setEditDate(int $editDate): self
    {
        $this->editDate = $editDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEditDate(): ?int
    {
        return $this->editDate;
    }

    /**
     * @param string $mediaGroupId
     * @return static
     */
    public function setMediaGroupId(string $mediaGroupId): self
    {
        $this->mediaGroupId = $mediaGroupId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMediaGroupId(): ?string
    {
        return $this->mediaGroupId;
    }

    /**
     * @param string $authorSignature
     * @return static
     */
    public function setAuthorSignature(string $authorSignature): self
    {
        $this->authorSignature = $authorSignature;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->authorSignature;
    }

    /**
     * @param string $text
     * @return static
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param MessageEntity[] $entities
     * @return static
     */
    public function setEntities(array $entities): self
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param MessageEntity[] $captionEntities
     * @return static
     */
    public function setCaptionEntities(array $captionEntities): self
    {
        $this->captionEntities = $captionEntities;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getCaptionEntities(): ?array
    {
        return $this->captionEntities;
    }

    /**
     * @param Audio $audio
     * @return static
     */
    public function setAudio(Audio $audio): self
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @param Document $document
     * @return static
     */
    public function setDocument(Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param Animation $animation
     * @return static
     */
    public function setAnimation(Animation $animation): self
    {
        $this->animation = $animation;

        return $this;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Game $game
     * @return static
     */
    public function setGame(Game $game): self
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param PhotoSize[] $photo
     * @return static
     */
    public function setPhoto(array $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param Sticker $sticker
     * @return static
     */
    public function setSticker(Sticker $sticker): self
    {
        $this->sticker = $sticker;

        return $this;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Video $video
     * @return static
     */
    public function setVideo(Video $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param Voice $voice
     * @return static
     */
    public function setVoice(Voice $voice): self
    {
        $this->voice = $voice;

        return $this;
    }

    /**
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @param VideoNote $videoNote
     * @return static
     */
    public function setVideoNote(VideoNote $videoNote): self
    {
        $this->videoNote = $videoNote;

        return $this;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->videoNote;
    }

    /**
     * @param string $caption
     * @return static
     */
    public function setCaption(string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCaption(): ?string
    {
        return $this->caption;
    }

    /**
     * @param Contact $contact
     * @return static
     */
    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Location $location
     * @return static
     */
    public function setLocation(Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Venue $venue
     * @return static
     */
    public function setVenue(Venue $venue): self
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    /**
     * @param Poll $poll
     * @return static
     */
    public function setPoll(Poll $poll): self
    {
        $this->poll = $poll;

        return $this;
    }

    /**
     * @return Poll|null
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * @param User[] $newChatMembers
     * @return static
     */
    public function setNewChatMembers(array $newChatMembers): self
    {
        $this->newChatMembers = $newChatMembers;

        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getNewChatMembers(): ?array
    {
        return $this->newChatMembers;
    }

    /**
     * @param User $leftChatMember
     * @return static
     */
    public function setLeftChatMember(User $leftChatMember): self
    {
        $this->leftChatMember = $leftChatMember;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getLeftChatMember(): ?User
    {
        return $this->leftChatMember;
    }

    /**
     * @param string $newChatTitle
     * @return static
     */
    public function setNewChatTitle(string $newChatTitle): self
    {
        $this->newChatTitle = $newChatTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewChatTitle(): ?string
    {
        return $this->newChatTitle;
    }

    /**
     * @param PhotoSize[] $newChatPhoto
     * @return static
     */
    public function setNewChatPhoto(array $newChatPhoto): self
    {
        $this->newChatPhoto = $newChatPhoto;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getNewChatPhoto(): ?array
    {
        return $this->newChatPhoto;
    }

    /**
     * @param bool $deleteChatPhoto
     * @return static
     */
    public function setDeleteChatPhoto(bool $deleteChatPhoto): self
    {
        $this->deleteChatPhoto = $deleteChatPhoto;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDeleteChatPhoto(): ?bool
    {
        return $this->deleteChatPhoto;
    }

    /**
     * @param bool $groupChatCreated
     * @return static
     */
    public function setGroupChatCreated(bool $groupChatCreated): self
    {
        $this->groupChatCreated = $groupChatCreated;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGroupChatCreated(): ?bool
    {
        return $this->groupChatCreated;
    }

    /**
     * @param bool $supergroupChatCreated
     * @return static
     */
    public function setSupergroupChatCreated(bool $supergroupChatCreated): self
    {
        $this->supergroupChatCreated = $supergroupChatCreated;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSupergroupChatCreated(): ?bool
    {
        return $this->supergroupChatCreated;
    }

    /**
     * @param bool $channelChatCreated
     * @return static
     */
    public function setChannelChatCreated(bool $channelChatCreated): self
    {
        $this->channelChatCreated = $channelChatCreated;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChannelChatCreated(): ?bool
    {
        return $this->channelChatCreated;
    }

    /**
     * @param int $migrateToChatId
     * @return static
     */
    public function setMigrateToChatId(int $migrateToChatId): self
    {
        $this->migrateToChatId = $migrateToChatId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int $migrateFromChatId
     * @return static
     */
    public function setMigrateFromChatId(int $migrateFromChatId): self
    {
        $this->migrateFromChatId = $migrateFromChatId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateFromChatId(): ?int
    {
        return $this->migrateFromChatId;
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
     * @param Invoice $invoice
     * @return static
     */
    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param SuccessfulPayment $successfulPayment
     * @return static
     */
    public function setSuccessfulPayment(SuccessfulPayment $successfulPayment): self
    {
        $this->successfulPayment = $successfulPayment;

        return $this;
    }

    /**
     * @return SuccessfulPayment|null
     */
    public function getSuccessfulPayment(): ?SuccessfulPayment
    {
        return $this->successfulPayment;
    }

    /**
     * @param string $connectedWebsite
     * @return static
     */
    public function setConnectedWebsite(string $connectedWebsite): self
    {
        $this->connectedWebsite = $connectedWebsite;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getConnectedWebsite(): ?string
    {
        return $this->connectedWebsite;
    }

    /**
     * @param PassportData $passportData
     * @return static
     */
    public function setPassportData(PassportData $passportData): self
    {
        $this->passportData = $passportData;

        return $this;
    }

    /**
     * @return PassportData|null
     */
    public function getPassportData(): ?PassportData
    {
        return $this->passportData;
    }

    /**
     * @param InlineKeyboardMarkup $replyMarkup
     * @return static
     */
    public function setReplyMarkup(InlineKeyboardMarkup $replyMarkup): self
    {
        $this->replyMarkup = $replyMarkup;

        return $this;
    }

    /**
     * @return InlineKeyboardMarkup|null
     */
    public function getReplyMarkup(): ?InlineKeyboardMarkup
    {
        return $this->replyMarkup;
    }

}