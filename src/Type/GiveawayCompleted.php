<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#giveawaycompleted
 *
 * This object represents a service message about the completion of a giveaway without public winners. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class GiveawayCompleted extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'winner_count',
            'unclaimed_prize_count',
            'giveaway_message',
            'is_star_giveaway',
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
            'winner_count' => $this->getWinnerCount(),
            'unclaimed_prize_count' => $this->getUnclaimedPrizeCount(),
            'giveaway_message' => $this->getGiveawayMessage(),
            'is_star_giveaway' => $this->getIsStarGiveaway(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Number of winners in the giveaway 
     *
     * @var int
     * @SerializedName("winner_count")
     * @Accessor(getter="getWinnerCount", setter="setWinnerCount")
     * @Type("int")
     */
    protected $winnerCount;

    /**
     * Optional. Number of undistributed prizes 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("unclaimed_prize_count")
     * @Accessor(getter="getUnclaimedPrizeCount", setter="setUnclaimedPrizeCount")
     * @Type("int")
     */
    protected $unclaimedPrizeCount;

    /**
     * Optional. Message with the giveaway that was completed, if it wasn't deleted 
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("giveaway_message")
     * @Accessor(getter="getGiveawayMessage", setter="setGiveawayMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $giveawayMessage;

    /**
     * Optional. True, if the giveaway is a Telegram Star giveaway. Otherwise, currently, the giveaway is a Telegram 
     * Premium giveaway. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_star_giveaway")
     * @Accessor(getter="getIsStarGiveaway", setter="setIsStarGiveaway")
     * @Type("bool")
     */
    protected $isStarGiveaway;


    /**
     * @param int $winnerCount
     * @return static
     */
    public function setWinnerCount(int $winnerCount): self
    {
        $this->winnerCount = $winnerCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getWinnerCount(): int
    {
        return $this->winnerCount;
    }

    /**
     * @param int $unclaimedPrizeCount
     * @return static
     */
    public function setUnclaimedPrizeCount(int $unclaimedPrizeCount): self
    {
        $this->unclaimedPrizeCount = $unclaimedPrizeCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUnclaimedPrizeCount(): ?int
    {
        return $this->unclaimedPrizeCount;
    }

    /**
     * @param Message $giveawayMessage
     * @return static
     */
    public function setGiveawayMessage(Message $giveawayMessage): self
    {
        $this->giveawayMessage = $giveawayMessage;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getGiveawayMessage(): ?Message
    {
        return $this->giveawayMessage;
    }

    /**
     * @param bool $isStarGiveaway
     * @return static
     */
    public function setIsStarGiveaway(bool $isStarGiveaway): self
    {
        $this->isStarGiveaway = $isStarGiveaway;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsStarGiveaway(): ?bool
    {
        return $this->isStarGiveaway;
    }

}