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
 * This object represents an incoming 
 * update.At most one of the optional parameters can be present in any given update. 
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
            'inline_query',
            'chosen_inline_result',
            'callback_query',
            'shipping_query',
            'pre_checkout_query',
            'poll',
            'poll_answer',
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
            'update_id' => $this->getUpdateId(),
            'message' => $this->getMessage(),
            'edited_message' => $this->getEditedMessage(),
            'channel_post' => $this->getChannelPost(),
            'edited_channel_post' => $this->getEditedChannelPost(),
            'inline_query' => $this->getInlineQuery(),
            'chosen_inline_result' => $this->getChosenInlineResult(),
            'callback_query' => $this->getCallbackQuery(),
            'shipping_query' => $this->getShippingQuery(),
            'pre_checkout_query' => $this->getPreCheckoutQuery(),
            'poll' => $this->getPoll(),
            'poll_answer' => $this->getPollAnswer(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase 
     * sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated updates or to 
     * restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then 
     * identifier of the next update will be chosen randomly instead of sequentially. 
     *
     * @var int
     * @SerializedName("update_id")
     * @Accessor(getter="getUpdateId",setter="setUpdateId")
     * @Type("int")
     */
    protected $updateId;

    /**
     * Optional. New incoming message of any kind — text, photo, sticker, etc. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("message")
     * @Accessor(getter="getMessage",setter="setMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $message;

    /**
     * Optional. New version of a message that is known to the bot and was edited 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("edited_message")
     * @Accessor(getter="getEditedMessage",setter="setEditedMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $editedMessage;

    /**
     * Optional. New incoming channel post of any kind — text, photo, sticker, etc. 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("channel_post")
     * @Accessor(getter="getChannelPost",setter="setChannelPost")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $channelPost;

    /**
     * Optional. New version of a channel post that is known to the bot and was edited 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("edited_channel_post")
     * @Accessor(getter="getEditedChannelPost",setter="setEditedChannelPost")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $editedChannelPost;

    /**
     * Optional. New incoming inline query 
     *
     * @var InlineQuery|null
     * @SkipWhenEmpty
     * @SerializedName("inline_query")
     * @Accessor(getter="getInlineQuery",setter="setInlineQuery")
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
     * @Accessor(getter="getChosenInlineResult",setter="setChosenInlineResult")
     * @Type("MadmagesTelegram\Types\Type\ChosenInlineResult")
     */
    protected $chosenInlineResult;

    /**
     * Optional. New incoming callback query 
     *
     * @var CallbackQuery|null
     * @SkipWhenEmpty
     * @SerializedName("callback_query")
     * @Accessor(getter="getCallbackQuery",setter="setCallbackQuery")
     * @Type("MadmagesTelegram\Types\Type\CallbackQuery")
     */
    protected $callbackQuery;

    /**
     * Optional. New incoming shipping query. Only for invoices with flexible price 
     *
     * @var ShippingQuery|null
     * @SkipWhenEmpty
     * @SerializedName("shipping_query")
     * @Accessor(getter="getShippingQuery",setter="setShippingQuery")
     * @Type("MadmagesTelegram\Types\Type\ShippingQuery")
     */
    protected $shippingQuery;

    /**
     * Optional. New incoming pre-checkout query. Contains full information about checkout 
     *
     * @var PreCheckoutQuery|null
     * @SkipWhenEmpty
     * @SerializedName("pre_checkout_query")
     * @Accessor(getter="getPreCheckoutQuery",setter="setPreCheckoutQuery")
     * @Type("MadmagesTelegram\Types\Type\PreCheckoutQuery")
     */
    protected $preCheckoutQuery;

    /**
     * Optional. New poll state. Bots receive only updates about stopped polls and polls, which are sent by the bot 
     *
     * @var Poll|null
     * @SkipWhenEmpty
     * @SerializedName("poll")
     * @Accessor(getter="getPoll",setter="setPoll")
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
     * @Accessor(getter="getPollAnswer",setter="setPollAnswer")
     * @Type("MadmagesTelegram\Types\Type\PollAnswer")
     */
    protected $pollAnswer;


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

}