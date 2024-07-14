<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputlocationmessagecontent
 *
 * Represents the content of a location message to be sent as the result of an 
 * inline query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputLocationMessageContent extends AbstractInputMessageContent
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'latitude',
            'longitude',
            'horizontal_accuracy',
            'live_period',
            'heading',
            'proximity_alert_radius',
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
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'horizontal_accuracy' => $this->getHorizontalAccuracy(),
            'live_period' => $this->getLivePeriod(),
            'heading' => $this->getHeading(),
            'proximity_alert_radius' => $this->getProximityAlertRadius(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Latitude of the location in degrees 
     *
     * @var float
     * @SerializedName("latitude")
     * @Accessor(getter="getLatitude", setter="setLatitude")
     * @Type("float")
     */
    protected $latitude;

    /**
     * Longitude of the location in degrees 
     *
     * @var float
     * @SerializedName("longitude")
     * @Accessor(getter="getLongitude", setter="setLongitude")
     * @Type("float")
     */
    protected $longitude;

    /**
     * Optional. The radius of uncertainty for the location, measured in meters; 0-1500 
     *
     * @var float|null
     * @SkipWhenEmpty
     * @SerializedName("horizontal_accuracy")
     * @Accessor(getter="getHorizontalAccuracy", setter="setHorizontalAccuracy")
     * @Type("float")
     */
    protected $horizontalAccuracy;

    /**
     * Optional. Period in seconds during which the location can be updated, should be between 60 and 86400, or 0x7FFFFFFF 
     * for live locations that can be edited indefinitely. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("live_period")
     * @Accessor(getter="getLivePeriod", setter="setLivePeriod")
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
     * @Accessor(getter="getHeading", setter="setHeading")
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
     * @Accessor(getter="getProximityAlertRadius", setter="setProximityAlertRadius")
     * @Type("int")
     */
    protected $proximityAlertRadius;


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

}