<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultarticle
 *
 * Represents a link to an article or web page. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultArticle extends AbstractInlineQueryResult
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
            'input_message_content',
            'reply_markup',
            'url',
            'hide_url',
            'description',
            'thumb_url',
            'thumb_width',
            'thumb_height',
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
            'input_message_content' => $this->getInputMessageContent(),
            'reply_markup' => $this->getReplyMarkup(),
            'url' => $this->getUrl(),
            'hide_url' => $this->getHideUrl(),
            'description' => $this->getDescription(),
            'thumb_url' => $this->getThumbUrl(),
            'thumb_width' => $this->getThumbWidth(),
            'thumb_height' => $this->getThumbHeight(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the result, must be article 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 Bytes 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * Title of the result 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Content of the message to be sent 
     *
     * @var AbstractInputMessageContent
     * @SerializedName("input_message_content")
     * @Accessor(getter="getInputMessageContent",setter="setInputMessageContent")
     * @Type("MadmagesTelegram\Types\Type\AbstractInputMessageContent")
     */
    protected $inputMessageContent;

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
     * Optional. URL of the result 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("url")
     * @Accessor(getter="getUrl",setter="setUrl")
     * @Type("string")
     */
    protected $url;

    /**
     * Optional. Pass True if you don't want the URL to be shown in the message 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("hide_url")
     * @Accessor(getter="getHideUrl",setter="setHideUrl")
     * @Type("bool")
     */
    protected $hideUrl;

    /**
     * Optional. Short description of the result 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("description")
     * @Accessor(getter="getDescription",setter="setDescription")
     * @Type("string")
     */
    protected $description;

    /**
     * Optional. Url of the thumbnail for the result 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("thumb_url")
     * @Accessor(getter="getThumbUrl",setter="setThumbUrl")
     * @Type("string")
     */
    protected $thumbUrl;

    /**
     * Optional. Thumbnail width 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("thumb_width")
     * @Accessor(getter="getThumbWidth",setter="setThumbWidth")
     * @Type("int")
     */
    protected $thumbWidth;

    /**
     * Optional. Thumbnail height 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("thumb_height")
     * @Accessor(getter="getThumbHeight",setter="setThumbHeight")
     * @Type("int")
     */
    protected $thumbHeight;


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
     * @param AbstractInputMessageContent $inputMessageContent
     * @return static
     */
    public function setInputMessageContent(AbstractInputMessageContent $inputMessageContent): self
    {
        $this->inputMessageContent = $inputMessageContent;

        return $this;
    }

    /**
     * @return AbstractInputMessageContent
     */
    public function getInputMessageContent(): AbstractInputMessageContent
    {
        return $this->inputMessageContent;
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
     * @param string $url
     * @return static
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param bool $hideUrl
     * @return static
     */
    public function setHideUrl(bool $hideUrl): self
    {
        $this->hideUrl = $hideUrl;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHideUrl(): ?bool
    {
        return $this->hideUrl;
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
     * @param string $thumbUrl
     * @return static
     */
    public function setThumbUrl(string $thumbUrl): self
    {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getThumbUrl(): ?string
    {
        return $this->thumbUrl;
    }

    /**
     * @param int $thumbWidth
     * @return static
     */
    public function setThumbWidth(int $thumbWidth): self
    {
        $this->thumbWidth = $thumbWidth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbWidth(): ?int
    {
        return $this->thumbWidth;
    }

    /**
     * @param int $thumbHeight
     * @return static
     */
    public function setThumbHeight(int $thumbHeight): self
    {
        $this->thumbHeight = $thumbHeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getThumbHeight(): ?int
    {
        return $this->thumbHeight;
    }

}