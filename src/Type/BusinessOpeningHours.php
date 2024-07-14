<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#businessopeninghours
 *
 * Describes the opening hours of a business. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BusinessOpeningHours extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'time_zone_name',
            'opening_hours',
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
            'time_zone_name' => $this->getTimeZoneName(),
            'opening_hours' => $this->getOpeningHours(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique name of the time zone for which the opening hours are defined 
     *
     * @var string
     * @SerializedName("time_zone_name")
     * @Accessor(getter="getTimeZoneName", setter="setTimeZoneName")
     * @Type("string")
     */
    protected $timeZoneName;

    /**
     * List of time intervals describing business opening hours 
     *
     * @var BusinessOpeningHoursInterval[]
     * @SerializedName("opening_hours")
     * @Accessor(getter="getOpeningHours", setter="setOpeningHours")
     * @Type("array<MadmagesTelegram\Types\Type\BusinessOpeningHoursInterval>")
     */
    protected $openingHours;


    /**
     * @param string $timeZoneName
     * @return static
     */
    public function setTimeZoneName(string $timeZoneName): self
    {
        $this->timeZoneName = $timeZoneName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeZoneName(): string
    {
        return $this->timeZoneName;
    }

    /**
     * @param BusinessOpeningHoursInterval[] $openingHours
     * @return static
     */
    public function setOpeningHours(array $openingHours): self
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    /**
     * @return BusinessOpeningHoursInterval[]
     */
    public function getOpeningHours(): array
    {
        return $this->openingHours;
    }

}