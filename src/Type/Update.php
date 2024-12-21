<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#update
 *
 * This object represents an incoming update.At most one of 
 * the optional parameters can be present in any given update. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Update extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'update_id',
            'message',
            'edited_message',
            'channel_post',
            'edited_channel_post',
            'business_connection',
            'business_message',
            'edited_business_message',
            'deleted_business_messages',
            'message_reaction',
            'message_reaction_count',
            'inline_query',
            'chosen_inline_result',
            'callback_query',
            'shipping_query',
            'pre_checkout_query',
            'purchased_paid_media',
            'poll',
            'poll_answer',
            'my_chat_member',
            'chat_member',
            'chat_join_request',
            'chat_boost',
            'removed_chat_boost',
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
            'update_id' => $this->getUpdateId(),
            'message' => $this->getMessage(),
            'edited_message' => $this->getEditedMessage(),
            'channel_post' => $this->getChannelPost(),
            'edited_channel_post' => $this->getEditedChannelPost(),
            'business_connection' => $this->getBusinessConnection(),
            'business_message' => $this->getBusinessMessage(),
            'edited_business_message' => $this->getEditedBusinessMessage(),
            'deleted_business_messages' => $this->getDeletedBusinessMessages(),
            'message_reaction' => $this->getMessageReaction(),
            'message_reaction_count' => $this->getMessageReactionCount(),
            'inline_query' => $this->getInlineQuery(),
            'chosen_inline_result' => $this->getChosenInlineResult(),
            'callback_query' => $this->getCallbackQuery(),
            'shipping_query' => $this->getShippingQuery(),
            'pre_checkout_query' => $this->getPreCheckoutQuery(),
            'purchased_paid_media' => $this->getPurchasedPaidMedia(),
            'poll' => $this->getPoll(),
            'poll_answer' => $this->getPollAnswer(),
            'my_chat_member' => $this->getMyChatMember(),
            'chat_member' => $this->getChatMember(),
            'chat_join_request' => $this->getChatJoinRequest(),
            'chat_boost' => $this->getChatBoost(),
            'removed_chat_boost' => $this->getRemovedChatBoost(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The update's unique identifier. Update identifiers start from a certain positive number and increase 
     * sequentially. This identifier becomes especially handy if you're using webhooks, since it allows you to ignore repeated updates 
     * or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, 
     * then identifier of the next update will be chosen randomly instead of sequentially. 
     *
     * @var int
     * @SerializedName("update_id")
     * @Accessor(getter="getUpdateId", setter="setUpdateId")
     * @Type("int")
     */
    protected $updateId;

    /**
     * Optional. New incoming message of any kind - text, photo, sticker, etc. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("message")
     * @Accessor(getter="getMessage", setter="setMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $message;

    /**
     * Optional. New version of a message that is known to the bot and was edited. This update may at times be triggered by 
     * changes to message fields that are either unavailable or not actively used by your bot. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("edited_message")
     * @Accessor(getter="getEditedMessage", setter="setEditedMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $editedMessage;

    /**
     * Optional. New incoming channel post of any kind - text, photo, sticker, etc. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("channel_post")
     * @Accessor(getter="getChannelPost", setter="setChannelPost")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $channelPost;

    /**
     * Optional. New version of a channel post that is known to the bot and was edited. This update may at times be triggered by 
     * changes to message fields that are either unavailable or not actively used by your bot. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("edited_channel_post")
     * @Accessor(getter="getEditedChannelPost", setter="setEditedChannelPost")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $editedChannelPost;

    /**
     * Optional. The bot was connected to or disconnected from a business account, or a user edited an existing connection 
     * with the bot 
     *
     * @var BusinessConnection|null
     * @SkipWhenEmpty
     * @SerializedName("business_connection")
     * @Accessor(getter="getBusinessConnection", setter="setBusinessConnection")
     * @Type("MadmagesTelegram\Types\Type\BusinessConnection")
     */
    protected $businessConnection;

    /**
     * Optional. New message from a connected business account 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("business_message")
     * @Accessor(getter="getBusinessMessage", setter="setBusinessMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $businessMessage;

    /**
     * Optional. New version of a message from a connected business account 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("edited_business_message")
     * @Accessor(getter="getEditedBusinessMessage", setter="setEditedBusinessMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $editedBusinessMessage;

    /**
     * Optional. Messages were deleted from a connected business account 
     *
     * @var BusinessMessagesDeleted|null
     * @SkipWhenEmpty
     * @SerializedName("deleted_business_messages")
     * @Accessor(getter="getDeletedBusinessMessages", setter="setDeletedBusinessMessages")
     * @Type("MadmagesTelegram\Types\Type\BusinessMessagesDeleted")
     */
    protected $deletedBusinessMessages;

    /**
     * Optional. A reaction to a message was changed by a user. The bot must be an administrator in the chat and must 
     * explicitly specify "message_reaction" in the list of allowed_updates to receive these updates. The update isn't received for 
     * reactions set by bots. 
     *
     * @var MessageReactionUpdated|null
     * @SkipWhenEmpty
     * @SerializedName("message_reaction")
     * @Accessor(getter="getMessageReaction", setter="setMessageReaction")
     * @Type("MadmagesTelegram\Types\Type\MessageReactionUpdated")
     */
    protected $messageReaction;

    /**
     * Optional. Reactions to a message with anonymous reactions were changed. The bot must be an administrator in the chat 
     * and must explicitly specify "message_reaction_count" in the list of allowed_updates to receive these updates. The 
     * updates are grouped and can be sent with delay up to a few minutes. 
     *
     * @var MessageReactionCountUpdated|null
     * @SkipWhenEmpty
     * @SerializedName("message_reaction_count")
     * @Accessor(getter="getMessageReactionCount", setter="setMessageReactionCount")
     * @Type("MadmagesTelegram\Types\Type\MessageReactionCountUpdated")
     */
    protected $messageReactionCount;

    /**
     * Optional. New incoming inline query 
     *
     * @var InlineQuery|null
     * @SkipWhenEmpty
     * @SerializedName("inline_query")
     * @Accessor(getter="getInlineQuery", setter="setInlineQuery")
     * @Type("MadmagesTelegram\Types\Type\InlineQuery")
     */
    protected $inlineQuery;

    /**
     * Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our 
     * documentation on the feedback collecting for details on how to enable these updates for your bot. 
     *
     * @var ChosenInlineResult|null
     * @SkipWhenEmpty
     * @SerializedName("chosen_inline_result")
     * @Accessor(getter="getChosenInlineResult", setter="setChosenInlineResult")
     * @Type("MadmagesTelegram\Types\Type\ChosenInlineResult")
     */
    protected $chosenInlineResult;

    /**
     * Optional. New incoming callback query 
     *
     * @var CallbackQuery|null
     * @SkipWhenEmpty
     * @SerializedName("callback_query")
     * @Accessor(getter="getCallbackQuery", setter="setCallbackQuery")
     * @Type("MadmagesTelegram\Types\Type\CallbackQuery")
     */
    protected $callbackQuery;

    /**
     * Optional. New incoming shipping query. Only for invoices with flexible price 
     *
     * @var ShippingQuery|null
     * @SkipWhenEmpty
     * @SerializedName("shipping_query")
     * @Accessor(getter="getShippingQuery", setter="setShippingQuery")
     * @Type("MadmagesTelegram\Types\Type\ShippingQuery")
     */
    protected $shippingQuery;

    /**
     * Optional. New incoming pre-checkout query. Contains full information about checkout 
     *
     * @var PreCheckoutQuery|null
     * @SkipWhenEmpty
     * @SerializedName("pre_checkout_query")
     * @Accessor(getter="getPreCheckoutQuery", setter="setPreCheckoutQuery")
     * @Type("MadmagesTelegram\Types\Type\PreCheckoutQuery")
     */
    protected $preCheckoutQuery;

    /**
     * Optional. A user purchased paid media with a non-empty payload sent by the bot in a non-channel chat 
     *
     * @var PaidMediaPurchased|null
     * @SkipWhenEmpty
     * @SerializedName("purchased_paid_media")
     * @Accessor(getter="getPurchasedPaidMedia", setter="setPurchasedPaidMedia")
     * @Type("MadmagesTelegram\Types\Type\PaidMediaPurchased")
     */
    protected $purchasedPaidMedia;

    /**
     * Optional. New poll state. Bots receive only updates about manually stopped polls and polls, which are sent by the bot 
     *
     * @var Poll|null
     * @SkipWhenEmpty
     * @SerializedName("poll")
     * @Accessor(getter="getPoll", setter="setPoll")
     * @Type("MadmagesTelegram\Types\Type\Poll")
     */
    protected $poll;

    /**
     * Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by 
     * the bot itself. 
     *
     * @var PollAnswer|null
     * @SkipWhenEmpty
     * @SerializedName("poll_answer")
     * @Accessor(getter="getPollAnswer", setter="setPollAnswer")
     * @Type("MadmagesTelegram\Types\Type\PollAnswer")
     */
    protected $pollAnswer;

    /**
     * Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the 
     * bot is blocked or unblocked by the user. 
     *
     * @var ChatMemberUpdated|null
     * @SkipWhenEmpty
     * @SerializedName("my_chat_member")
     * @Accessor(getter="getMyChatMember", setter="setMyChatMember")
     * @Type("MadmagesTelegram\Types\Type\ChatMemberUpdated")
     */
    protected $myChatMember;

    /**
     * Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must 
     * explicitly specify "chat_member" in the list of allowed_updates to receive these updates. 
     *
     * @var ChatMemberUpdated|null
     * @SkipWhenEmpty
     * @SerializedName("chat_member")
     * @Accessor(getter="getChatMember", setter="setChatMember")
     * @Type("MadmagesTelegram\Types\Type\ChatMemberUpdated")
     */
    protected $chatMember;

    /**
     * Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the 
     * chat to receive these updates. 
     *
     * @var ChatJoinRequest|null
     * @SkipWhenEmpty
     * @SerializedName("chat_join_request")
     * @Accessor(getter="getChatJoinRequest", setter="setChatJoinRequest")
     * @Type("MadmagesTelegram\Types\Type\ChatJoinRequest")
     */
    protected $chatJoinRequest;

    /**
     * Optional. A chat boost was added or changed. The bot must be an administrator in the chat to receive these updates. 
     *
     * @var ChatBoostUpdated|null
     * @SkipWhenEmpty
     * @SerializedName("chat_boost")
     * @Accessor(getter="getChatBoost", setter="setChatBoost")
     * @Type("MadmagesTelegram\Types\Type\ChatBoostUpdated")
     */
    protected $chatBoost;

    /**
     * Optional. A boost was removed from a chat. The bot must be an administrator in the chat to receive these updates. 
     *
     * @var ChatBoostRemoved|null
     * @SkipWhenEmpty
     * @SerializedName("removed_chat_boost")
     * @Accessor(getter="getRemovedChatBoost", setter="setRemovedChatBoost")
     * @Type("MadmagesTelegram\Types\Type\ChatBoostRemoved")
     */
    protected $removedChatBoost;


    /**
     * @param int $updateId
     * @return static
     */
    public function setUpdateId(int $updateId): self
    {
        $this->updateId = $updateId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUpdateId(): int
    {
        return $this->updateId;
    }

    /**
     * @param Message $message
     * @return static
     */
    public function setMessage(Message $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    /**
     * @param Message $editedMessage
     * @return static
     */
    public function setEditedMessage(Message $editedMessage): self
    {
        $this->editedMessage = $editedMessage;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedMessage(): ?Message
    {
        return $this->editedMessage;
    }

    /**
     * @param Message $channelPost
     * @return static
     */
    public function setChannelPost(Message $channelPost): self
    {
        $this->channelPost = $channelPost;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getChannelPost(): ?Message
    {
        return $this->channelPost;
    }

    /**
     * @param Message $editedChannelPost
     * @return static
     */
    public function setEditedChannelPost(Message $editedChannelPost): self
    {
        $this->editedChannelPost = $editedChannelPost;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedChannelPost(): ?Message
    {
        return $this->editedChannelPost;
    }

    /**
     * @param BusinessConnection $businessConnection
     * @return static
     */
    public function setBusinessConnection(BusinessConnection $businessConnection): self
    {
        $this->businessConnection = $businessConnection;

        return $this;
    }

    /**
     * @return BusinessConnection|null
     */
    public function getBusinessConnection(): ?BusinessConnection
    {
        return $this->businessConnection;
    }

    /**
     * @param Message $businessMessage
     * @return static
     */
    public function setBusinessMessage(Message $businessMessage): self
    {
        $this->businessMessage = $businessMessage;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getBusinessMessage(): ?Message
    {
        return $this->businessMessage;
    }

    /**
     * @param Message $editedBusinessMessage
     * @return static
     */
    public function setEditedBusinessMessage(Message $editedBusinessMessage): self
    {
        $this->editedBusinessMessage = $editedBusinessMessage;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getEditedBusinessMessage(): ?Message
    {
        return $this->editedBusinessMessage;
    }

    /**
     * @param BusinessMessagesDeleted $deletedBusinessMessages
     * @return static
     */
    public function setDeletedBusinessMessages(BusinessMessagesDeleted $deletedBusinessMessages): self
    {
        $this->deletedBusinessMessages = $deletedBusinessMessages;

        return $this;
    }

    /**
     * @return BusinessMessagesDeleted|null
     */
    public function getDeletedBusinessMessages(): ?BusinessMessagesDeleted
    {
        return $this->deletedBusinessMessages;
    }

    /**
     * @param MessageReactionUpdated $messageReaction
     * @return static
     */
    public function setMessageReaction(MessageReactionUpdated $messageReaction): self
    {
        $this->messageReaction = $messageReaction;

        return $this;
    }

    /**
     * @return MessageReactionUpdated|null
     */
    public function getMessageReaction(): ?MessageReactionUpdated
    {
        return $this->messageReaction;
    }

    /**
     * @param MessageReactionCountUpdated $messageReactionCount
     * @return static
     */
    public function setMessageReactionCount(MessageReactionCountUpdated $messageReactionCount): self
    {
        $this->messageReactionCount = $messageReactionCount;

        return $this;
    }

    /**
     * @return MessageReactionCountUpdated|null
     */
    public function getMessageReactionCount(): ?MessageReactionCountUpdated
    {
        return $this->messageReactionCount;
    }

    /**
     * @param InlineQuery $inlineQuery
     * @return static
     */
    public function setInlineQuery(InlineQuery $inlineQuery): self
    {
        $this->inlineQuery = $inlineQuery;

        return $this;
    }

    /**
     * @return InlineQuery|null
     */
    public function getInlineQuery(): ?InlineQuery
    {
        return $this->inlineQuery;
    }

    /**
     * @param ChosenInlineResult $chosenInlineResult
     * @return static
     */
    public function setChosenInlineResult(ChosenInlineResult $chosenInlineResult): self
    {
        $this->chosenInlineResult = $chosenInlineResult;

        return $this;
    }

    /**
     * @return ChosenInlineResult|null
     */
    public function getChosenInlineResult(): ?ChosenInlineResult
    {
        return $this->chosenInlineResult;
    }

    /**
     * @param CallbackQuery $callbackQuery
     * @return static
     */
    public function setCallbackQuery(CallbackQuery $callbackQuery): self
    {
        $this->callbackQuery = $callbackQuery;

        return $this;
    }

    /**
     * @return CallbackQuery|null
     */
    public function getCallbackQuery(): ?CallbackQuery
    {
        return $this->callbackQuery;
    }

    /**
     * @param ShippingQuery $shippingQuery
     * @return static
     */
    public function setShippingQuery(ShippingQuery $shippingQuery): self
    {
        $this->shippingQuery = $shippingQuery;

        return $this;
    }

    /**
     * @return ShippingQuery|null
     */
    public function getShippingQuery(): ?ShippingQuery
    {
        return $this->shippingQuery;
    }

    /**
     * @param PreCheckoutQuery $preCheckoutQuery
     * @return static
     */
    public function setPreCheckoutQuery(PreCheckoutQuery $preCheckoutQuery): self
    {
        $this->preCheckoutQuery = $preCheckoutQuery;

        return $this;
    }

    /**
     * @return PreCheckoutQuery|null
     */
    public function getPreCheckoutQuery(): ?PreCheckoutQuery
    {
        return $this->preCheckoutQuery;
    }

    /**
     * @param PaidMediaPurchased $purchasedPaidMedia
     * @return static
     */
    public function setPurchasedPaidMedia(PaidMediaPurchased $purchasedPaidMedia): self
    {
        $this->purchasedPaidMedia = $purchasedPaidMedia;

        return $this;
    }

    /**
     * @return PaidMediaPurchased|null
     */
    public function getPurchasedPaidMedia(): ?PaidMediaPurchased
    {
        return $this->purchasedPaidMedia;
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
     * @param PollAnswer $pollAnswer
     * @return static
     */
    public function setPollAnswer(PollAnswer $pollAnswer): self
    {
        $this->pollAnswer = $pollAnswer;

        return $this;
    }

    /**
     * @return PollAnswer|null
     */
    public function getPollAnswer(): ?PollAnswer
    {
        return $this->pollAnswer;
    }

    /**
     * @param ChatMemberUpdated $myChatMember
     * @return static
     */
    public function setMyChatMember(ChatMemberUpdated $myChatMember): self
    {
        $this->myChatMember = $myChatMember;

        return $this;
    }

    /**
     * @return ChatMemberUpdated|null
     */
    public function getMyChatMember(): ?ChatMemberUpdated
    {
        return $this->myChatMember;
    }

    /**
     * @param ChatMemberUpdated $chatMember
     * @return static
     */
    public function setChatMember(ChatMemberUpdated $chatMember): self
    {
        $this->chatMember = $chatMember;

        return $this;
    }

    /**
     * @return ChatMemberUpdated|null
     */
    public function getChatMember(): ?ChatMemberUpdated
    {
        return $this->chatMember;
    }

    /**
     * @param ChatJoinRequest $chatJoinRequest
     * @return static
     */
    public function setChatJoinRequest(ChatJoinRequest $chatJoinRequest): self
    {
        $this->chatJoinRequest = $chatJoinRequest;

        return $this;
    }

    /**
     * @return ChatJoinRequest|null
     */
    public function getChatJoinRequest(): ?ChatJoinRequest
    {
        return $this->chatJoinRequest;
    }

    /**
     * @param ChatBoostUpdated $chatBoost
     * @return static
     */
    public function setChatBoost(ChatBoostUpdated $chatBoost): self
    {
        $this->chatBoost = $chatBoost;

        return $this;
    }

    /**
     * @return ChatBoostUpdated|null
     */
    public function getChatBoost(): ?ChatBoostUpdated
    {
        return $this->chatBoost;
    }

    /**
     * @param ChatBoostRemoved $removedChatBoost
     * @return static
     */
    public function setRemovedChatBoost(ChatBoostRemoved $removedChatBoost): self
    {
        $this->removedChatBoost = $removedChatBoost;

        return $this;
    }

    /**
     * @return ChatBoostRemoved|null
     */
    public function getRemovedChatBoost(): ?ChatBoostRemoved
    {
        return $this->removedChatBoost;
    }

}