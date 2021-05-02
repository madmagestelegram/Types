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
            'horizontal_accuracy',
            'live_period',
            'heading',
            'proximity_alert_radius',
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
    public function _getData(): array
    {
        $result = [
            'type' => $this->getType(),
            'id' => $this->getId(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'title' => $this->getTitle(),
            'horizontal_accuracy' => $this->getHorizontalAccuracy(),
            'live_period' => $this->getLivePeriod(),
            'heading' => $this->getHeading(),
            'proximity_alert_radius' => $this->getProximityAlertRadius(),
            'reply_markup' => $this->getReplyMarkup(),
            'input_message_content' => $this->getInputMessageContent(),
            'thumb_url' => $this->getThumbUrl(),
            'thumb_width' => $this->getThumbWidth(),
            'thumb_height' => $this->getThumbHeight(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the result, must be location 
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
     * Location latitude in degrees 
     *
     * @var float
     * @SerializedName("latitude")
     * @Accessor(getter="getLatitude",setter="setLatitude")
     * @Type("float")
     */
    protected $latitude;

    /**
     * Location longitude in degrees 
     *
     * @var float
     * @SerializedName("longitude")
     * @Accessor(getter="getLongitude",setter="setLongitude")
     * @Type("float")
     */
    protected $longitude;

    /**
     * Location title 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500 
     *
     * @var float|null
     * @SkipWhenEmpty
     * @SerializedName("horizontal_accuracy")
     * @Accessor(getter="getHorizontalAccuracy",setter="setHorizontalAccuracy")
     * @Type("float")
     */
    protected $horizontalAccuracy;

    /**
     * Optional. Period in seconds for which the location can be updated, should be between 60 and 86400. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("live_period")
     * @Accessor(getter="getLivePeriod",setter="setLivePeriod")
     * @Type("int")
     */
    protected $livePeriod;

    /**
     * Optional. For live locations, a direction in which the user is moving, in degrees. Must be between 1 and 360 if 
     * specified. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("heading")
     * @Accessor(getter="getHeading",setter="setHeading")
     * @Type("int")
     */
    protected $heading;

    /**
     * Optional. For live locations, a maximum distance for proximity alerts about approaching another chat member, in 
     * meters. Must be between 1 and 100000 if specified. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("proximity_alert_radius")
     * @Accessor(getter="getProximityAlertRadius",setter="setProximityAlertRadius")
     * @Type("int")
     */
    protected $proximityAlertRadius;

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
     * Optional. Content of the message to be sent instead of the location 
     *
     * @var AbstractInputMessageContent|null
     * @SkipWhenEmpty
     * @SerializedName("input_message_content")
     * @Accessor(getter="getInputMessageContent",setter="setInputMessageContent")
     * @Type("MadmagesTelegram\Types\Type\AbstractInputMessageContent")
     */
    protected $inputMessageContent;

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
     * @param float $horizontalAccuracy
     * @return static
     */
    public function setHorizontalAccuracy(float $horizontalAccuracy): self
    {
        $this->horizontalAccuracy = $horizontalAccuracy;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getHorizontalAccuracy(): ?float
    {
        return $this->horizontalAccuracy;
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
     * @param int $heading
     * @return static
     */
    public function setHeading(int $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeading(): ?int
    {
        return $this->heading;
    }

    /**
     * @param int $proximityAlertRadius
     * @return static
     */
    public function setProximityAlertRadius(int $proximityAlertRadius): self
    {
        $this->proximityAlertRadius = $proximityAlertRadius;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getProximityAlertRadius(): ?int
    {
        return $this->proximityAlertRadius;
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