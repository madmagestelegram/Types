<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#transactionpartneruser
 *
 * Describes a transaction with a user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class TransactionPartnerUser extends AbstractTransactionPartner
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
            'user',
            'affiliate',
            'invoice_payload',
            'subscription_period',
            'paid_media',
            'paid_media_payload',
            'gift',
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
            'user' => $this->getUser(),
            'affiliate' => $this->getAffiliate(),
            'invoice_payload' => $this->getInvoicePayload(),
            'subscription_period' => $this->getSubscriptionPeriod(),
            'paid_media' => $this->getPaidMedia(),
            'paid_media_payload' => $this->getPaidMediaPayload(),
            'gift' => $this->getGift(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the transaction partner, always “user” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Information about the user 
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser", setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * Optional. Information about the affiliate that received a commission via this transaction 
     *
     * @var AffiliateInfo|null
     * @SkipWhenEmpty
     * @SerializedName("affiliate")
     * @Accessor(getter="getAffiliate", setter="setAffiliate")
     * @Type("MadmagesTelegram\Types\Type\AffiliateInfo")
     */
    protected $affiliate;

    /**
     * Optional. Bot-specified invoice payload 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("invoice_payload")
     * @Accessor(getter="getInvoicePayload", setter="setInvoicePayload")
     * @Type("string")
     */
    protected $invoicePayload;

    /**
     * Optional. The duration of the paid subscription 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("subscription_period")
     * @Accessor(getter="getSubscriptionPeriod", setter="setSubscriptionPeriod")
     * @Type("int")
     */
    protected $subscriptionPeriod;

    /**
     * Optional. Information about the paid media bought by the user 
     *
     * @var AbstractPaidMedia[]|null
     * @SkipWhenEmpty
     * @SerializedName("paid_media")
     * @Accessor(getter="getPaidMedia", setter="setPaidMedia")
     * @Type("array<MadmagesTelegram\Types\Type\AbstractPaidMedia>")
     */
    protected $paidMedia;

    /**
     * Optional. Bot-specified paid media payload 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("paid_media_payload")
     * @Accessor(getter="getPaidMediaPayload", setter="setPaidMediaPayload")
     * @Type("string")
     */
    protected $paidMediaPayload;

    /**
     * Optional. The gift sent to the user by the bot 
     *
     * @var Gift|null
     * @SkipWhenEmpty
     * @SerializedName("gift")
     * @Accessor(getter="getGift", setter="setGift")
     * @Type("MadmagesTelegram\Types\Type\Gift")
     */
    protected $gift;


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
     * @param User $user
     * @return static
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param AffiliateInfo $affiliate
     * @return static
     */
    public function setAffiliate(AffiliateInfo $affiliate): self
    {
        $this->affiliate = $affiliate;

        return $this;
    }

    /**
     * @return AffiliateInfo|null
     */
    public function getAffiliate(): ?AffiliateInfo
    {
        return $this->affiliate;
    }

    /**
     * @param string $invoicePayload
     * @return static
     */
    public function setInvoicePayload(string $invoicePayload): self
    {
        $this->invoicePayload = $invoicePayload;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInvoicePayload(): ?string
    {
        return $this->invoicePayload;
    }

    /**
     * @param int $subscriptionPeriod
     * @return static
     */
    public function setSubscriptionPeriod(int $subscriptionPeriod): self
    {
        $this->subscriptionPeriod = $subscriptionPeriod;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubscriptionPeriod(): ?int
    {
        return $this->subscriptionPeriod;
    }

    /**
     * @param AbstractPaidMedia[] $paidMedia
     * @return static
     */
    public function setPaidMedia(array $paidMedia): self
    {
        $this->paidMedia = $paidMedia;

        return $this;
    }

    /**
     * @return AbstractPaidMedia[]|null
     */
    public function getPaidMedia(): ?array
    {
        return $this->paidMedia;
    }

    /**
     * @param string $paidMediaPayload
     * @return static
     */
    public function setPaidMediaPayload(string $paidMediaPayload): self
    {
        $this->paidMediaPayload = $paidMediaPayload;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaidMediaPayload(): ?string
    {
        return $this->paidMediaPayload;
    }

    /**
     * @param Gift $gift
     * @return static
     */
    public function setGift(Gift $gift): self
    {
        $this->gift = $gift;

        return $this;
    }

    /**
     * @return Gift|null
     */
    public function getGift(): ?Gift
    {
        return $this->gift;
    }

}