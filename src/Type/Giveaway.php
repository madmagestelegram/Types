<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#giveaway
 *
 * This object represents a message about a scheduled giveaway. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Giveaway extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'chats',
            'winners_selection_date',
            'winner_count',
            'only_new_members',
            'has_public_winners',
            'prize_description',
            'country_codes',
            'premium_subscription_month_count',
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
            'chats' => $this->getChats(),
            'winners_selection_date' => $this->getWinnersSelectionDate(),
            'winner_count' => $this->getWinnerCount(),
            'only_new_members' => $this->getOnlyNewMembers(),
            'has_public_winners' => $this->getHasPublicWinners(),
            'prize_description' => $this->getPrizeDescription(),
            'country_codes' => $this->getCountryCodes(),
            'premium_subscription_month_count' => $this->getPremiumSubscriptionMonthCount(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The list of chats which the user must join to participate in the giveaway 
     *
     * @var Chat[]
     * @SerializedName("chats")
     * @Accessor(getter="getChats", setter="setChats")
     * @Type("array<MadmagesTelegram\Types\Type\Chat>")
     */
    protected $chats;

    /**
     * Point in time (Unix timestamp) when winners of the giveaway will be selected 
     *
     * @var int
     * @SerializedName("winners_selection_date")
     * @Accessor(getter="getWinnersSelectionDate", setter="setWinnersSelectionDate")
     * @Type("int")
     */
    protected $winnersSelectionDate;

    /**
     * The number of users which are supposed to be selected as winners of the giveaway 
     *
     * @var int
     * @SerializedName("winner_count")
     * @Accessor(getter="getWinnerCount", setter="setWinnerCount")
     * @Type("int")
     */
    protected $winnerCount;

    /**
     * Optional. True, if only users who join the chats after the giveaway started should be eligible to win 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("only_new_members")
     * @Accessor(getter="getOnlyNewMembers", setter="setOnlyNewMembers")
     * @Type("bool")
     */
    protected $onlyNewMembers;

    /**
     * Optional. True, if the list of giveaway winners will be visible to everyone 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_public_winners")
     * @Accessor(getter="getHasPublicWinners", setter="setHasPublicWinners")
     * @Type("bool")
     */
    protected $hasPublicWinners;

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
     * Optional. A list of two-letter ISO 3166-1 alpha-2 country codes indicating the countries from which eligible users 
     * for the giveaway must come. If empty, then all users can participate in the giveaway. Users with a phone number that was 
     * bought on Fragment can always participate in giveaways. 
     *
     * @var string[]|null
     * @SkipWhenEmpty
     * @SerializedName("country_codes")
     * @Accessor(getter="getCountryCodes", setter="setCountryCodes")
     * @Type("array<string>")
     */
    protected $countryCodes;

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
     * @param Chat[] $chats
     * @return static
     */
    public function setChats(array $chats): self
    {
        $this->chats = $chats;

        return $this;
    }

    /**
     * @return Chat[]
     */
    public function getChats(): array
    {
        return $this->chats;
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
     * @param bool $hasPublicWinners
     * @return static
     */
    public function setHasPublicWinners(bool $hasPublicWinners): self
    {
        $this->hasPublicWinners = $hasPublicWinners;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasPublicWinners(): ?bool
    {
        return $this->hasPublicWinners;
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

    /**
     * @param string[] $countryCodes
     * @return static
     */
    public function setCountryCodes(array $countryCodes): self
    {
        $this->countryCodes = $countryCodes;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getCountryCodes(): ?array
    {
        return $this->countryCodes;
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

}