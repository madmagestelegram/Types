<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#birthdate
 *
 * Describes the birthdate of a user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Birthdate extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'day',
            'month',
            'year',
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
            'day' => $this->getDay(),
            'month' => $this->getMonth(),
            'year' => $this->getYear(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Day of the user's birth; 1-31 
     *
     * @var int
     * @SerializedName("day")
     * @Accessor(getter="getDay", setter="setDay")
     * @Type("int")
     */
    protected $day;

    /**
     * Month of the user's birth; 1-12 
     *
     * @var int
     * @SerializedName("month")
     * @Accessor(getter="getMonth", setter="setMonth")
     * @Type("int")
     */
    protected $month;

    /**
     * Optional. Year of the user's birth 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("year")
     * @Accessor(getter="getYear", setter="setYear")
     * @Type("int")
     */
    protected $year;


    /**
     * @param int $day
     * @return static
     */
    public function setDay(int $day): self
    {
        $this->day = $day;

        return $this;
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->day;
    }

    /**
     * @param int $month
     * @return static
     */
    public function setMonth(int $month): self
    {
        $this->month = $month;

        return $this;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->month;
    }

    /**
     * @param int $year
     * @return static
     */
    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

}