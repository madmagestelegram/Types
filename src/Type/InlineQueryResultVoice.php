<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultvoice
 *
 * Represents a link to a voice recording in an .OGG container encoded with OPUS. By default, this voice recording will be 
 * sent by the user. Alternatively, you can use input_message_content to send a message with the specified 
 * content instead of the the voice message. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultVoice extends AbstractInlineQueryResult
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
            'voice_url',
            'title',
            'caption',
            'parse_mode',
            'caption_entities',
            'voice_duration',
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
            'voice_url' => $this->getVoiceUrl(),
            'title' => $this->getTitle(),
            'caption' => $this->getCaption(),
            'parse_mode' => $this->getParseMode(),
            'caption_entities' => $this->getCaptionEntities(),
            'voice_duration' => $this->getVoiceDuration(),
            'reply_markup' => $this->getReplyMarkup(),
            'input_message_content' => $this->getInputMessageContent(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the result, must be voice 
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
     * A valid URL for the voice recording 
     *
     * @var string
     * @SerializedName("voice_url")
     * @Accessor(getter="getVoiceUrl", setter="setVoiceUrl")
     * @Type("string")
     */
    protected $voiceUrl;

    /**
     * Recording title 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Caption, 0-1024 characters after entities parsing 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption", setter="setCaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Mode for parsing entities in the voice message caption. See formatting options for more details. 
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
     * Optional. Recording duration in seconds 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("voice_duration")
     * @Accessor(getter="getVoiceDuration", setter="setVoiceDuration")
     * @Type("int")
     */
    protected $voiceDuration;

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
     * Optional. Content of the message to be sent instead of the voice recording 
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
     * @param string $voiceUrl
     * @return static
     */
    public function setVoiceUrl(string $voiceUrl): self
    {
        $this->voiceUrl = $voiceUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getVoiceUrl(): string
    {
        return $this->voiceUrl;
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
     * @param int $voiceDuration
     * @return static
     */
    public function setVoiceDuration(int $voiceDuration): self
    {
        $this->voiceDuration = $voiceDuration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVoiceDuration(): ?int
    {
        return $this->voiceDuration;
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