<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#replyparameters
 *
 * Describes reply parameters for the message that is being sent. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ReplyParameters extends AbstractType
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
            'chat_id',
            'allow_sending_without_reply',
            'quote',
            'quote_parse_mode',
            'quote_entities',
            'quote_position',
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
            'message_id' => $this->getMessageId(),
            'chat_id' => $this->getChatId(),
            'allow_sending_without_reply' => $this->getAllowSendingWithoutReply(),
            'quote' => $this->getQuote(),
            'quote_parse_mode' => $this->getQuoteParseMode(),
            'quote_entities' => $this->getQuoteEntities(),
            'quote_position' => $this->getQuotePosition(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it is specified 
     *
     * @var int
     * @SerializedName("message_id")
     * @Accessor(getter="getMessageId", setter="setMessageId")
     * @Type("int")
     */
    protected $messageId;

    /**
     * Optional. If the message to be replied to is from a different chat, unique identifier for the chat or username of the 
     * channel (in the format @|channelusername). Not supported for messages sent on behalf of a business account. 
     *
     * @var int|string|null
     * @SkipWhenEmpty
     * @SerializedName("chat_id")
     * @Accessor(getter="getChatId", setter="setChatId")
     * @Type("string")
     */
    protected $chatId;

    /**
     * Optional. Pass True if the message should be sent even if the specified message to be replied to is not found. Always 
     * False for replies in another chat or forum topic. Always True for messages sent on behalf of a business account. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("allow_sending_without_reply")
     * @Accessor(getter="getAllowSendingWithoutReply", setter="setAllowSendingWithoutReply")
     * @Type("bool")
     */
    protected $allowSendingWithoutReply;

    /**
     * Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote must be an 
     * exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler, and 
     * custom_emoji entities. The message will fail to send if the quote isn't found in the original message. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("quote")
     * @Accessor(getter="getQuote", setter="setQuote")
     * @Type("string")
     */
    protected $quote;

    /**
     * Optional. Mode for parsing entities in the quote. See formatting options for more details. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("quote_parse_mode")
     * @Accessor(getter="getQuoteParseMode", setter="setQuoteParseMode")
     * @Type("string")
     */
    protected $quoteParseMode;

    /**
     * Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified instead of 
     * quote_parse_mode. 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("quote_entities")
     * @Accessor(getter="getQuoteEntities", setter="setQuoteEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $quoteEntities;

    /**
     * Optional. Position of the quote in the original message in UTF-16 code units 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("quote_position")
     * @Accessor(getter="getQuotePosition", setter="setQuotePosition")
     * @Type("int")
     */
    protected $quotePosition;


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
     * @param int|string $chatId
     * @return static
     */
    public function setChatId( $chatId): self
    {
        $this->chatId = $chatId;

        return $this;
    }

    /**
     * @return int|string|null
     */
    public function getChatId()
    {
        return $this->chatId;
    }

    /**
     * @param bool $allowSendingWithoutReply
     * @return static
     */
    public function setAllowSendingWithoutReply(bool $allowSendingWithoutReply): self
    {
        $this->allowSendingWithoutReply = $allowSendingWithoutReply;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowSendingWithoutReply(): ?bool
    {
        return $this->allowSendingWithoutReply;
    }

    /**
     * @param string $quote
     * @return static
     */
    public function setQuote(string $quote): self
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuote(): ?string
    {
        return $this->quote;
    }

    /**
     * @param string $quoteParseMode
     * @return static
     */
    public function setQuoteParseMode(string $quoteParseMode): self
    {
        $this->quoteParseMode = $quoteParseMode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuoteParseMode(): ?string
    {
        return $this->quoteParseMode;
    }

    /**
     * @param MessageEntity[] $quoteEntities
     * @return static
     */
    public function setQuoteEntities(array $quoteEntities): self
    {
        $this->quoteEntities = $quoteEntities;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getQuoteEntities(): ?array
    {
        return $this->quoteEntities;
    }

    /**
     * @param int $quotePosition
     * @return static
     */
    public function setQuotePosition(int $quotePosition): self
    {
        $this->quotePosition = $quotePosition;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuotePosition(): ?int
    {
        return $this->quotePosition;
    }

}