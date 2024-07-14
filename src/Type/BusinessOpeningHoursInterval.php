<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#businessopeninghoursinterval
 *
 * Describes an interval of time during which a business is open. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BusinessOpeningHoursInterval extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'opening_minute',
            'closing_minute',
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
            'opening_minute' => $this->getOpeningMinute(),
            'closing_minute' => $this->getClosingMinute(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The minute's sequence number in a week, starting on Monday, marking the start of the time interval during which the 
     * business is open; 0 - 7 * 24 * 60 
     *
     * @var int
     * @SerializedName("opening_minute")
     * @Accessor(getter="getOpeningMinute", setter="setOpeningMinute")
     * @Type("int")
     */
    protected $openingMinute;

    /**
     * The minute's sequence number in a week, starting on Monday, marking the end of the time interval during which the 
     * business is open; 0 - 8 * 24 * 60 
     *
     * @var int
     * @SerializedName("closing_minute")
     * @Accessor(getter="getClosingMinute", setter="setClosingMinute")
     * @Type("int")
     */
    protected $closingMinute;


    /**
     * @param int $openingMinute
     * @return static
     */
    public function setOpeningMinute(int $openingMinute): self
    {
        $this->openingMinute = $openingMinute;

        return $this;
    }

    /**
     * @return int
     */
    public function getOpeningMinute(): int
    {
        return $this->openingMinute;
    }

    /**
     * @param int $closingMinute
     * @return static
     */
    public function setClosingMinute(int $closingMinute): self
    {
        $this->closingMinute = $closingMinute;

        return $this;
    }

    /**
     * @return int
     */
    public function getClosingMinute(): int
    {
        return $this->closingMinute;
    }

}