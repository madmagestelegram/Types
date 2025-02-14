<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#giveawaycreated
 *
 * This object represents a service message about the creation of a scheduled giveaway. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class GiveawayCreated extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'prize_star_count',
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
            'prize_star_count' => $this->getPrizeStarCount(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. The number of Telegram Stars to be split between giveaway winners; for Telegram Star giveaways only 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("prize_star_count")
     * @Accessor(getter="getPrizeStarCount", setter="setPrizeStarCount")
     * @Type("int")
     */
    protected $prizeStarCount;


    /**
     * @param int $prizeStarCount
     * @return static
     */
    public function setPrizeStarCount(int $prizeStarCount): self
    {
        $this->prizeStarCount = $prizeStarCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrizeStarCount(): ?int
    {
        return $this->prizeStarCount;
    }

}