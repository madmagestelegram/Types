<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultgif
 *
 * Represents a link to an animated GIF file. By default, this animated GIF file will be sent by the user with optional 
 * caption. Alternatively, you can use input_message_content to send a message with the specified content instead of 
 * the animation. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultGif extends AbstractInlineQueryResult
{
    /**
     * Type of the result, must be gif
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="settype")
     * @Type("string")
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 bytes
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setid")
     * @Type("string")
     */
    protected $id;

    /**
     * A valid URL for the GIF file. File size must not exceed 1MB
     *
     * @var string
     * @SerializedName("gif_url")
     * @Accessor(getter="getGifUrl",setter="setgifUrl")
     * @Type("string")
     */
    protected $gifUrl;

    /**
     * Optional. Width of the GIF
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("gif_width")
     * @Accessor(getter="getGifWidth",setter="setgifWidth")
     * @Type("int")
     */
    protected $gifWidth;

    /**
     * Optional. Height of the GIF
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("gif_height")
     * @Accessor(getter="getGifHeight",setter="setgifHeight")
     * @Type("int")
     */
    protected $gifHeight;

    /**
     * Optional. Duration of the GIF
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("gif_duration")
     * @Accessor(getter="getGifDuration",setter="setgifDuration")
     * @Type("int")
     */
    protected $gifDuration;

    /**
     * URL of the static thumbnail for the result (jpeg or gif)
     *
     * @var string
     * @SerializedName("thumb_url")
     * @Accessor(getter="getThumbUrl",setter="setthumbUrl")
     * @Type("string")
     */
    protected $thumbUrl;

    /**
     * Optional. Title for the result
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="settitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Caption of the GIF file to be sent, 0-1024 characters
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption",setter="setcaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in the media caption.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode",setter="setparseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. Inline keyboard attached to the message
     *
     * @var InlineKeyboardMarkup|null
     * @SkipWhenEmpty
     * @SerializedName("reply_markup")
     * @Accessor(getter="getReplyMarkup",setter="setreplyMarkup")
     * @Type("MadmagesTelegram\Types\Type\InlineKeyboardMarkup")
     */
    protected $replyMarkup;

    /**
     * Optional. Content of the message to be sent instead of the GIF animation
     *
     * @var AbstractInputMessageContent|null
     * @SkipWhenEmpty
     * @SerializedName("input_message_content")
     * @Accessor(getter="getInputMessageContent",setter="setinputMessageContent")
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
     * @param string $gifUrl
     * @return static
     */
    public function setGifUrl(string $gifUrl): self
    {
        $this->gifUrl = $gifUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getGifUrl(): string
    {
        return $this->gifUrl;
    }

    /**
     * @param int $gifWidth
     * @return static
     */
    public function setGifWidth(int $gifWidth): self
    {
        $this->gifWidth = $gifWidth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifWidth(): ?int
    {
        return $this->gifWidth;
    }

    /**
     * @param int $gifHeight
     * @return static
     */
    public function setGifHeight(int $gifHeight): self
    {
        $this->gifHeight = $gifHeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifHeight(): ?int
    {
        return $this->gifHeight;
    }

    /**
     * @param int $gifDuration
     * @return static
     */
    public function setGifDuration(int $gifDuration): self
    {
        $this->gifDuration = $gifDuration;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getGifDuration(): ?int
    {
        return $this->gifDuration;
    }

    /**
     * @param string $thumbUrl
     * @return static
     */
    public function setThumbUrl(string $thumbUrl): self
    {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbUrl(): string
    {
        return $this->thumbUrl;
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