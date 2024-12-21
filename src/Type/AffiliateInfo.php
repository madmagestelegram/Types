<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#affiliateinfo
 *
 * Contains information about the affiliate that received a commission via this transaction. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class AffiliateInfo extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'affiliate_user',
            'affiliate_chat',
            'commission_per_mille',
            'amount',
            'nanostar_amount',
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
            'affiliate_user' => $this->getAffiliateUser(),
            'affiliate_chat' => $this->getAffiliateChat(),
            'commission_per_mille' => $this->getCommissionPerMille(),
            'amount' => $this->getAmount(),
            'nanostar_amount' => $this->getNanostarAmount(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. The bot or the user that received an affiliate commission if it was received by a bot or a user 
     *
     * @var User|null
     * @SkipWhenEmpty
     * @SerializedName("affiliate_user")
     * @Accessor(getter="getAffiliateUser", setter="setAffiliateUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $affiliateUser;

    /**
     * Optional. The chat that received an affiliate commission if it was received by a chat 
     *
     * @var Chat|null
     * @SkipWhenEmpty
     * @SerializedName("affiliate_chat")
     * @Accessor(getter="getAffiliateChat", setter="setAffiliateChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $affiliateChat;

    /**
     * The number of Telegram Stars received by the affiliate for each 1000 Telegram Stars received by the bot from referred 
     * users 
     *
     * @var int
     * @SerializedName("commission_per_mille")
     * @Accessor(getter="getCommissionPerMille", setter="setCommissionPerMille")
     * @Type("int")
     */
    protected $commissionPerMille;

    /**
     * Integer amount of Telegram Stars received by the affiliate from the transaction, rounded to 0; can be negative for 
     * refunds 
     *
     * @var int
     * @SerializedName("amount")
     * @Accessor(getter="getAmount", setter="setAmount")
     * @Type("int")
     */
    protected $amount;

    /**
     * Optional. The number of 1/1000000000 shares of Telegram Stars received by the affiliate; from -999999999 to 
     * 999999999; can be negative for refunds 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("nanostar_amount")
     * @Accessor(getter="getNanostarAmount", setter="setNanostarAmount")
     * @Type("int")
     */
    protected $nanostarAmount;


    /**
     * @param User $affiliateUser
     * @return static
     */
    public function setAffiliateUser(User $affiliateUser): self
    {
        $this->affiliateUser = $affiliateUser;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getAffiliateUser(): ?User
    {
        return $this->affiliateUser;
    }

    /**
     * @param Chat $affiliateChat
     * @return static
     */
    public function setAffiliateChat(Chat $affiliateChat): self
    {
        $this->affiliateChat = $affiliateChat;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getAffiliateChat(): ?Chat
    {
        return $this->affiliateChat;
    }

    /**
     * @param int $commissionPerMille
     * @return static
     */
    public function setCommissionPerMille(int $commissionPerMille): self
    {
        $this->commissionPerMille = $commissionPerMille;

        return $this;
    }

    /**
     * @return int
     */
    public function getCommissionPerMille(): int
    {
        return $this->commissionPerMille;
    }

    /**
     * @param int $amount
     * @return static
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $nanostarAmount
     * @return static
     */
    public function setNanostarAmount(int $nanostarAmount): self
    {
        $this->nanostarAmount = $nanostarAmount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNanostarAmount(): ?int
    {
        return $this->nanostarAmount;
    }

}