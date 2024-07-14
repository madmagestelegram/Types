<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#giveawaywinners
 *
 * This object represents a message about the completion of a giveaway with public winners. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class GiveawayWinners extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'chat',
            'giveaway_message_id',
            'winners_selection_date',
            'winner_count',
            'winners',
            'additional_chat_count',
            'premium_subscription_month_count',
            'unclaimed_prize_count',
            'only_new_members',
            'was_refunded',
            'prize_description',
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
            'chat' => $this->getChat(),
            'giveaway_message_id' => $this->getGiveawayMessageId(),
            'winners_selection_date' => $this->getWinnersSelectionDate(),
            'winner_count' => $this->getWinnerCount(),
            'winners' => $this->getWinners(),
            'additional_chat_count' => $this->getAdditionalChatCount(),
            'premium_subscription_month_count' => $this->getPremiumSubscriptionMonthCount(),
            'unclaimed_prize_count' => $this->getUnclaimedPrizeCount(),
            'only_new_members' => $this->getOnlyNewMembers(),
            'was_refunded' => $this->getWasRefunded(),
            'prize_description' => $this->getPrizeDescription(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The chat that created the giveaway 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * Identifier of the message with the giveaway in the chat 
     *
     * @var int
     * @SerializedName("giveaway_message_id")
     * @Accessor(getter="getGiveawayMessageId", setter="setGiveawayMessageId")
     * @Type("int")
     */
    protected $giveawayMessageId;

    /**
     * Point in time (Unix timestamp) when winners of the giveaway were selected 
     *
     * @var int
     * @SerializedName("winners_selection_date")
     * @Accessor(getter="getWinnersSelectionDate", setter="setWinnersSelectionDate")
     * @Type("int")
     */
    protected $winnersSelectionDate;

    /**
     * Total number of winners in the giveaway 
     *
     * @var int
     * @SerializedName("winner_count")
     * @Accessor(getter="getWinnerCount", setter="setWinnerCount")
     * @Type("int")
     */
    protected $winnerCount;

    /**
     * List of up to 100 winners of the giveaway 
     *
     * @var User[]
     * @SerializedName("winners")
     * @Accessor(getter="getWinners", setter="setWinners")
     * @Type("array<MadmagesTelegram\Types\Type\User>")
     */
    protected $winners;

    /**
     * Optional. The number of other chats the user had to join in order to be eligible for the giveaway 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("additional_chat_count")
     * @Accessor(getter="getAdditionalChatCount", setter="setAdditionalChatCount")
     * @Type("int")
     */
    protected $additionalChatCount;

    /**
     * Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("premium_subscription_month_count")
     * @Accessor(getter="getPremiumSubscriptionMonthCount", setter="setPremiumSubscriptionMonthCount")
     * @Type("int")
     */
    protected $premiumSubscriptionMonthCount;

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
     * Optional. True, if only users who had joined the chats after the giveaway started were eligible to win 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("only_new_members")
     * @Accessor(getter="getOnlyNewMembers", setter="setOnlyNewMembers")
     * @Type("bool")
     */
    protected $onlyNewMembers;

    /**
     * Optional. True, if the giveaway was canceled because the payment for it was refunded 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("was_refunded")
     * @Accessor(getter="getWasRefunded", setter="setWasRefunded")
     * @Type("bool")
     */
    protected $wasRefunded;

    /**
     * Optional. Description of additional giveaway prize 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("prize_description")
     * @Accessor(getter="getPrizeDescription", setter="setPrizeDescription")
     * @Type("string")
     */
    protected $prizeDescription;


    /**
     * @param Chat $chat
     * @return static
     */
    public function setChat(Chat $chat): self
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
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
     * @param int $winnersSelectionDate
     * @return static
     */
    public function setWinnersSelectionDate(int $winnersSelectionDate): self
    {
        $this->winnersSelectionDate = $winnersSelectionDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getWinnersSelectionDate(): int
    {
        return $this->winnersSelectionDate;
    }

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
     * @param User[] $winners
     * @return static
     */
    public function setWinners(array $winners): self
    {
        $this->winners = $winners;

        return $this;
    }

    /**
     * @return User[]
     */
    public function getWinners(): array
    {
        return $this->winners;
    }

    /**
     * @param int $additionalChatCount
     * @return static
     */
    public function setAdditionalChatCount(int $additionalChatCount): self
    {
        $this->additionalChatCount = $additionalChatCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAdditionalChatCount(): ?int
    {
        return $this->additionalChatCount;
    }

    /**
     * @param int $premiumSubscriptionMonthCount
     * @return static
     */
    public function setPremiumSubscriptionMonthCount(int $premiumSubscriptionMonthCount): self
    {
        $this->premiumSubscriptionMonthCount = $premiumSubscriptionMonthCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPremiumSubscriptionMonthCount(): ?int
    {
        return $this->premiumSubscriptionMonthCount;
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
     * @param bool $onlyNewMembers
     * @return static
     */
    public function setOnlyNewMembers(bool $onlyNewMembers): self
    {
        $this->onlyNewMembers = $onlyNewMembers;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOnlyNewMembers(): ?bool
    {
        return $this->onlyNewMembers;
    }

    /**
     * @param bool $wasRefunded
     * @return static
     */
    public function setWasRefunded(bool $wasRefunded): self
    {
        $this->wasRefunded = $wasRefunded;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getWasRefunded(): ?bool
    {
        return $this->wasRefunded;
    }

    /**
     * @param string $prizeDescription
     * @return static
     */
    public function setPrizeDescription(string $prizeDescription): self
    {
        $this->prizeDescription = $prizeDescription;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrizeDescription(): ?string
    {
        return $this->prizeDescription;
    }

}