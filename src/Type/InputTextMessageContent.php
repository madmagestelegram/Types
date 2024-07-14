<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputtextmessagecontent
 *
 * Represents the content of a text message to be sent as the result of an inline 
 * query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputTextMessageContent extends AbstractInputMessageContent
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'message_text',
            'parse_mode',
            'entities',
            'link_preview_options',
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
            'message_text' => $this->getMessageText(),
            'parse_mode' => $this->getParseMode(),
            'entities' => $this->getEntities(),
            'link_preview_options' => $this->getLinkPreviewOptions(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Text of the message to be sent, 1-4096 characters 
     *
     * @var string
     * @SerializedName("message_text")
     * @Accessor(getter="getMessageText", setter="setMessageText")
     * @Type("string")
     */
    protected $messageText;

    /**
     * Optional. Mode for parsing entities in the message text. See formatting options for more details. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode", setter="setParseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. List of special entities that appear in message text, which can be specified instead of parse_mode 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("entities")
     * @Accessor(getter="getEntities", setter="setEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $entities;

    /**
     * Optional. Link preview generation options for the message 
     *
     * @var LinkPreviewOptions|null
     * @SkipWhenEmpty
     * @SerializedName("link_preview_options")
     * @Accessor(getter="getLinkPreviewOptions", setter="setLinkPreviewOptions")
     * @Type("MadmagesTelegram\Types\Type\LinkPreviewOptions")
     */
    protected $linkPreviewOptions;


    /**
     * @param string $messageText
     * @return static
     */
    public function setMessageText(string $messageText): self
    {
        $this->messageText = $messageText;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->messageText;
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
     * @param LinkPreviewOptions $linkPreviewOptions
     * @return static
     */
    public function setLinkPreviewOptions(LinkPreviewOptions $linkPreviewOptions): self
    {
        $this->linkPreviewOptions = $linkPreviewOptions;

        return $this;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->linkPreviewOptions;
    }

}