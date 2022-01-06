<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultphoto
 *
 * Represents a link to a photo. By default, this photo will be sent by the user with optional caption. Alternatively, you 
 * can use input_message_content to send a message with the specified content instead of the photo. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultPhoto extends AbstractInlineQueryResult
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
            'photo_url',
            'thumb_url',
            'photo_width',
            'photo_height',
            'title',
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
            'photo_url' => $this->getPhotoUrl(),
            'thumb_url' => $this->getThumbUrl(),
            'photo_width' => $this->getPhotoWidth(),
            'photo_height' => $this->getPhotoHeight(),
            'title' => $this->getTitle(),
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
     * Type of the result, must be photo 
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
     * A valid URL of the photo. Photo must be in JPEG format. Photo size must not exceed 5MB 
     *
     * @var string
     * @SerializedName("photo_url")
     * @Accessor(getter="getPhotoUrl",setter="setPhotoUrl")
     * @Type("string")
     */
    protected $photoUrl;

    /**
     * URL of the thumbnail for the photo 
     *
     * @var string
     * @SerializedName("thumb_url")
     * @Accessor(getter="getThumbUrl",setter="setThumbUrl")
     * @Type("string")
     */
    protected $thumbUrl;

    /**
     * Optional. Width of the photo 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("photo_width")
     * @Accessor(getter="getPhotoWidth",setter="setPhotoWidth")
     * @Type("int")
     */
    protected $photoWidth;

    /**
     * Optional. Height of the photo 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("photo_height")
     * @Accessor(getter="getPhotoHeight",setter="setPhotoHeight")
     * @Type("int")
     */
    protected $photoHeight;

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
     * Optional. Caption of the photo to be sent, 0-1024 characters after entities parsing 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("caption")
     * @Accessor(getter="getCaption",setter="setCaption")
     * @Type("string")
     */
    protected $caption;

    /**
     * Optional. Mode for parsing entities in the photo caption. See formatting options for more details. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode",setter="setParseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. List of special entities that appear in the caption, which can be specified instead of parse_mode 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("caption_entities")
     * @Accessor(getter="getCaptionEntities",setter="setCaptionEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $captionEntities;

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
     * Optional. Content of the message to be sent instead of the photo 
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
     * @param string $photoUrl
     * @return static
     */
    public function setPhotoUrl(string $photoUrl): self
    {
        $this->photoUrl = $photoUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photoUrl;
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
     * @param int $photoWidth
     * @return static
     */
    public function setPhotoWidth(int $photoWidth): self
    {
        $this->photoWidth = $photoWidth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoWidth(): ?int
    {
        return $this->photoWidth;
    }

    /**
     * @param int $photoHeight
     * @return static
     */
    public function setPhotoHeight(int $photoHeight): self
    {
        $this->photoHeight = $photoHeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoHeight(): ?int
    {
        return $this->photoHeight;
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