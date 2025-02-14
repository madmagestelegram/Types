<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatboostsourcegiveaway
 *
 * The boost was obtained by the creation of a Telegram Premium or a Telegram Star giveaway. This boosts the chat 4 times 
 * for the duration of the corresponding Telegram Premium subscription for Telegram Premium giveaways and 
 * prize_star_count / 500 times for one year for Telegram Star giveaways. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatBoostSourceGiveaway extends AbstractChatBoostSource
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'source',
            'giveaway_message_id',
            'user',
            'prize_star_count',
            'is_unclaimed',
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
            'source' => $this->getSource(),
            'giveaway_message_id' => $this->getGiveawayMessageId(),
            'user' => $this->getUser(),
            'prize_star_count' => $this->getPrizeStarCount(),
            'is_unclaimed' => $this->getIsUnclaimed(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Source of the boost, always “giveaway” 
     *
     * @var string
     * @SerializedName("source")
     * @Accessor(getter="getSource", setter="setSource")
     * @Type("string")
     */
    protected $source;

    /**
     * Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if the 
     * message isn't sent yet. 
     *
     * @var int
     * @SerializedName("giveaway_message_id")
     * @Accessor(getter="getGiveawayMessageId", setter="setGiveawayMessageId")
     * @Type("int")
     */
    protected $giveawayMessageId;

    /**
     * Optional. User that won the prize in the giveaway if any; for Telegram Premium giveaways only 
     *
     * @var User|null
     * @SkipWhenEmpty
     * @SerializedName("user")
     * @Accessor(getter="getUser", setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

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
     * Optional. True, if the giveaway was completed, but there was no user to win the prize 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_unclaimed")
     * @Accessor(getter="getIsUnclaimed", setter="setIsUnclaimed")
     * @Type("bool")
     */
    protected $isUnclaimed;


    /**
     * @param string $source
     * @return static
     */
    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param int $giveawayMessageId
     * @return static
     */
    public function setGiveawayMessageId(int $giveawayMessageId): self
    {
        $this->giveawayMessageId = $giveawayMessageId;

        return $this;
    }

    /**
     * @return int
     */
    public function getGiveawayMessageId(): int
    {
        return $this->giveawayMessageId;
    }

    /**
     * @param User $user
     * @return static
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

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

    /**
     * @param bool $isUnclaimed
     * @return static
     */
    public function setIsUnclaimed(bool $isUnclaimed): self
    {
        $this->isUnclaimed = $isUnclaimed;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsUnclaimed(): ?bool
    {
        return $this->isUnclaimed;
    }

}