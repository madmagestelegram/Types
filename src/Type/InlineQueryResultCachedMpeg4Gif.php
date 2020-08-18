<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif
 *
 * Represents a link to a video animation (H.264/MPEG-4 AVC video without sound) stored on the Telegram servers. By 
 * default, this animated MPEG-4 file will be sent by the user with an optional caption. Alternatively, you can use 
 * input_message_content to send a message with the specified content instead of the animation. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultCachedMpeg4Gif extends AbstractInlineQueryResult
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
            'mpeg4_file_id',
            'title',
            'caption',
            'parse_mode',
            'reply_markup',
            'input_message_content',
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
            'type' => $this->getType(),
            'id' => $this->getId(),
            'mpeg4_file_id' => $this->getMpeg4FileId(),
            'title' => $this->getTitle(),
            'caption' => $this->getCaption(),
            'parse_mode' => $this->getParseMode(),
            'reply_markup' => $this->getReplyMarkup(),
            'input_message_content' => $this->getInputMessageContent(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Type of the result, must be mpeg4_gif 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 bytes 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * A valid file identifier for the MP4 file 
     *
     * @var string
     * @SerializedName("mpeg4_file_id")
     * @Accessor(getter="getMpeg4FileId",setter="setMpeg4FileId")
     * @Type("string")
     */
    protected $mpeg4FileId;

    /**
     * Optional. Title for the result 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Caption of the MPEG-4 file to be sent, 0-1024 characters after entities parsing 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption",setter="setCaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Mode for parsing entities in the caption. See formatting options for more details. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode",setter="setParseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. Inline keyboard attached to the message 
     *
     * @var InlineKeyboardMarkup|null
     * @SkipWhenEmpty
     * @SerializedName("reply_markup")
     * @Accessor(getter="getReplyMarkup",setter="setReplyMarkup")
     * @Type("MadmagesTelegram\Types\Type\InlineKeyboardMarkup")
     */
    protected $replyMarkup;

    /**
     * Optional. Content of the message to be sent instead of the video animation 
     *
     * @var AbstractInputMessageContent|null
     * @SkipWhenEmpty
     * @SerializedName("input_message_content")
     * @Accessor(getter="getInputMessageContent",setter="setInputMessageContent")
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
     * @param string $mpeg4FileId
     * @return static
     */
    public function setMpeg4FileId(string $mpeg4FileId): self
    {
        $this->mpeg4FileId = $mpeg4FileId;

        return $this;
    }

    /**
     * @return string
     */
    public function getMpeg4FileId(): string
    {
        return $this->mpeg4FileId;
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