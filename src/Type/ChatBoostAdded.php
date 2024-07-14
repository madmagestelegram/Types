<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatboostadded
 *
 * This object represents a service message about a user boosting a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatBoostAdded extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'boost_count',
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
            'boost_count' => $this->getBoostCount(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Number of boosts added by the user 
     *
     * @var int
     * @SerializedName("boost_count")
     * @Accessor(getter="getBoostCount", setter="setBoostCount")
     * @Type("int")
     */
    protected $boostCount;


    /**
     * @param int $boostCount
     * @return static
     */
    public function setBoostCount(int $boostCount): self
    {
        $this->boostCount = $boostCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getBoostCount(): int
    {
        return $this->boostCount;
    }

}