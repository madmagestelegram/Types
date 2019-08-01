<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultlocation
 *
 * Represents a location on a map. By default, the location will be sent by the user. Alternatively, you can use 
 * input_message_content to send a message with the specified content instead of the location. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultLocation extends AbstractInlineQueryResult
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
            'latitude',
            'longitude',
            'title',
            'live_period',
            'reply_markup',
            'input_message_content',
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
    public function _getRawData(): array
    {
        $result = [
            'type' => $this->getType(),
            'id' => $this->getId(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'title' => $this->getTitle(),
            'live_period' => $this->getLivePeriod(),
            'reply_markup' => $this->getReplyMarkup(),
            'input_message_content' => $this->getInputMessageContent(),
            'thumb_url' => $this->getThumbUrl(),
            'thumb_width' => $this->getThumbWidth(),
            'thumb_height' => $this->getThumbHeight(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Type of the result, must be location
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="settype")
     * @Type("string")
     */
    protected $type;

    /**
     * Unique identifier for this result, 1-64 Bytes
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setid")
     * @Type("string")
     */
    protected $id;

    /**
     * Location latitude in degrees
     *
     * @var float
     * @SerializedName("latitude")
     * @Accessor(getter="getLatitude",setter="setlatitude")
     * @Type("float")
     */
    protected $latitude;

    /**
     * Location longitude in degrees
     *
     * @var float
     * @SerializedName("longitude")
     * @Accessor(getter="getLongitude",setter="setlongitude")
     * @Type("float")
     */
    protected $longitude;

    /**
     * Location title
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="settitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Period in seconds for which the location can be updated, should be between 60 and 86400.
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("live_period")
     * @Accessor(getter="getLivePeriod",setter="setlivePeriod")
     * @Type("int")
     */
    protected $livePeriod;

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
     * Optional. Content of the message to be sent instead of the location
     *
     * @var AbstractInputMessageContent|null
     * @SkipWhenEmpty
     * @SerializedName("input_message_content")
     * @Accessor(getter="getInputMessageContent",setter="setinputMessageContent")
     * @Type("MadmagesTelegram\Types\Type\AbstractInputMessageContent")
     */
    protected $inputMessageContent;

    /**
     * Optional. Url of the thumbnail for the result
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("thumb_url")
     * @Accessor(getter="getThumbUrl",setter="setthumbUrl")
     * @Type("string")
     */
    protected $thumbUrl;

    /**
     * Optional. Thumbnail width
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("thumb_width")
     * @Accessor(getter="getThumbWidth",setter="setthumbWidth")
     * @Type("int")
     */
    protected $thumbWidth;

    /**
     * Optional. Thumbnail height
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("thumb_height")
     * @Accessor(getter="getThumbHeight",setter="setthumbHeight")
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
     * @param float $latitude
     * @return static
     */
    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $longitude
     * @return static
     */
    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
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
     * @param int $livePeriod
     * @return static
     */
    public function setLivePeriod(int $livePeriod): self
    {
        $this->livePeriod = $livePeriod;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getLivePeriod(): ?int
    {
        return $this->livePeriod;
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