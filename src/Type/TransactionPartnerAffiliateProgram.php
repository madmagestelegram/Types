<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#transactionpartneraffiliateprogram
 *
 * Describes the affiliate program that issued the affiliate commission received via this transaction. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class TransactionPartnerAffiliateProgram extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'type',
            'sponsor_user',
            'commission_per_mille',
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
            'type' => $this->getType(),
            'sponsor_user' => $this->getSponsorUser(),
            'commission_per_mille' => $this->getCommissionPerMille(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the transaction partner, always “affiliate_program” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Optional. Information about the bot that sponsored the affiliate program 
     *
     * @var User|null
     * @SkipWhenEmpty
     * @SerializedName("sponsor_user")
     * @Accessor(getter="getSponsorUser", setter="setSponsorUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $sponsorUser;

    /**
     * The number of Telegram Stars received by the bot for each 1000 Telegram Stars received by the affiliate program 
     * sponsor from referred users 
     *
     * @var int
     * @SerializedName("commission_per_mille")
     * @Accessor(getter="getCommissionPerMille", setter="setCommissionPerMille")
     * @Type("int")
     */
    protected $commissionPerMille;


    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param User $sponsorUser
     * @return static
     */
    public function setSponsorUser(User $sponsorUser): self
    {
        $this->sponsorUser = $sponsorUser;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getSponsorUser(): ?User
    {
        return $this->sponsorUser;
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

}