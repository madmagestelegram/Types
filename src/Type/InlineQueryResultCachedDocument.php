<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultcacheddocument
 *
 * Represents a link to a file stored on the Telegram servers. By default, this file will be sent by the user with an 
 * optional caption. Alternatively, you can use input_message_content to send a message with the specified content 
 * instead of the file. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultCachedDocument extends AbstractInlineQueryResult
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'type',
            'id',
            'title',
            'document_file_id',
            'description',
            'caption',
            'parse_mode',
            'caption_entities',
            'reply_markup',
            'input_message_content',
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
            'type' => $this->getType(),
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'document_file_id' => $this->getDocumentFileId(),
            'description' => $this->getDescription(),
            'caption' => $this->getCaption(),
            'parse_mode' => $this->getParseMode(),
            'caption_entities' => $this->getCaptionEntities(),
            'reply_markup' => $this->getReplyMarkup(),
            'input_message_content' => $this->getInputMessageContent(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the result, must be document 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 bytes 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId", setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * Title for the result 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * A valid file identifier for the file 
     *
     * @var string
     * @SerializedName("document_file_id")
     * @Accessor(getter="getDocumentFileId", setter="setDocumentFileId")
     * @Type("string")
     */
    protected $documentFileId;

    /**
     * Optional. Short description of the result 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("description")
     * @Accessor(getter="getDescription", setter="setDescription")
     * @Type("string")
     */
    protected $description;

    /**
     * Optional. Caption of the document to be sent, 0-1024 characters after entities parsing 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption", setter="setCaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Mode for parsing entities in the document caption. See formatting options for more details. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode", setter="setParseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("caption_entities")
     * @Accessor(getter="getCaptionEntities", setter="setCaptionEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $captionEntities;

    /**
     * Optional. Inline keyboard attached to the message 
     *
     * @var InlineKeyboardMarkup|null
     * @SkipWhenEmpty
     * @SerializedName("reply_markup")
     * @Accessor(getter="getReplyMarkup", setter="setReplyMarkup")
     * @Type("MadmagesTelegram\Types\Type\InlineKeyboardMarkup")
     */
    protected $replyMarkup;

    /**
     * Optional. Content of the message to be sent instead of the file 
     *
     * @var AbstractInputMessageContent|null
     * @SkipWhenEmpty
     * @SerializedName("input_message_content")
     * @Accessor(getter="getInputMessageContent", setter="setInputMessageContent")
     * @Type("MadmagesTelegram\Types\Type\AbstractInputMessageContent")
     */
    protected $inputMessageContent;


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
     * @param string $id
     * @return static
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $documentFileId
     * @return static
     */
    public function setDocumentFileId(string $documentFileId): self
    {
        $this->documentFileId = $documentFileId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentFileId(): string
    {
        return $this->documentFileId;
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
     * @param string $parseMode
     * @return static
     */
    public function setParseMode(string $parseMode): self
    {
        $this->parseMode = $parseMode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
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

    /**
     * @param AbstractInputMessageContent $inputMessageContent
     * @return static
     */
    public function setInputMessageContent(AbstractInputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;

        return $this;
    }

    /**
     * @return AbstractInputMessageContent|null
     */
    public function getInputMessageContent(): ?AbstractInputMessageContent
    {
        return $this->inputMessageContent;
    }

}