<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#successfulpayment
 *
 * This object contains basic information about a successful payment. Note that if the buyer initiates a chargeback 
 * with the relevant payment provider following this transaction, the funds may be debited from your balance. This is 
 * outside of Telegram's control. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class SuccessfulPayment extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'currency',
            'total_amount',
            'invoice_payload',
            'subscription_expiration_date',
            'is_recurring',
            'is_first_recurring',
            'shipping_option_id',
            'order_info',
            'telegram_payment_charge_id',
            'provider_payment_charge_id',
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
            'currency' => $this->getCurrency(),
            'total_amount' => $this->getTotalAmount(),
            'invoice_payload' => $this->getInvoicePayload(),
            'subscription_expiration_date' => $this->getSubscriptionExpirationDate(),
            'is_recurring' => $this->getIsRecurring(),
            'is_first_recurring' => $this->getIsFirstRecurring(),
            'shipping_option_id' => $this->getShippingOptionId(),
            'order_info' => $this->getOrderInfo(),
            'telegram_payment_charge_id' => $this->getTelegramPaymentChargeId(),
            'provider_payment_charge_id' => $this->getProviderPaymentChargeId(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars 
     *
     * @var string
     * @SerializedName("currency")
     * @Accessor(getter="getCurrency", setter="setCurrency")
     * @Type("string")
     */
    protected $currency;

    /**
     * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 
     * pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each 
     * currency (2 for the majority of currencies). 
     *
     * @var int
     * @SerializedName("total_amount")
     * @Accessor(getter="getTotalAmount", setter="setTotalAmount")
     * @Type("int")
     */
    protected $totalAmount;

    /**
     * Bot-specified invoice payload 
     *
     * @var string
     * @SerializedName("invoice_payload")
     * @Accessor(getter="getInvoicePayload", setter="setInvoicePayload")
     * @Type("string")
     */
    protected $invoicePayload;

    /**
     * Optional. Expiration date of the subscription, in Unix time; for recurring payments only 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("subscription_expiration_date")
     * @Accessor(getter="getSubscriptionExpirationDate", setter="setSubscriptionExpirationDate")
     * @Type("int")
     */
    protected $subscriptionExpirationDate;

    /**
     * Optional. True, if the payment is a recurring payment for a subscription 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_recurring")
     * @Accessor(getter="getIsRecurring", setter="setIsRecurring")
     * @Type("bool")
     */
    protected $isRecurring;

    /**
     * Optional. True, if the payment is the first payment for a subscription 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_first_recurring")
     * @Accessor(getter="getIsFirstRecurring", setter="setIsFirstRecurring")
     * @Type("bool")
     */
    protected $isFirstRecurring;

    /**
     * Optional. Identifier of the shipping option chosen by the user 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("shipping_option_id")
     * @Accessor(getter="getShippingOptionId", setter="setShippingOptionId")
     * @Type("string")
     */
    protected $shippingOptionId;

    /**
     * Optional. Order information provided by the user 
     *
     * @var OrderInfo|null
     * @SkipWhenEmpty
     * @SerializedName("order_info")
     * @Accessor(getter="getOrderInfo", setter="setOrderInfo")
     * @Type("MadmagesTelegram\Types\Type\OrderInfo")
     */
    protected $orderInfo;

    /**
     * Telegram payment identifier 
     *
     * @var string
     * @SerializedName("telegram_payment_charge_id")
     * @Accessor(getter="getTelegramPaymentChargeId", setter="setTelegramPaymentChargeId")
     * @Type("string")
     */
    protected $telegramPaymentChargeId;

    /**
     * Provider payment identifier 
     *
     * @var string
     * @SerializedName("provider_payment_charge_id")
     * @Accessor(getter="getProviderPaymentChargeId", setter="setProviderPaymentChargeId")
     * @Type("string")
     */
    protected $providerPaymentChargeId;


    /**
     * @param string $currency
     * @return static
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param int $totalAmount
     * @return static
     */
    public function setTotalAmount(int $totalAmount): self
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalAmount(): int
    {
        return $this->totalAmount;
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
     * @return string
     */
    public function getInvoicePayload(): string
    {
        return $this->invoicePayload;
    }

    /**
     * @param int $subscriptionExpirationDate
     * @return static
     */
    public function setSubscriptionExpirationDate(int $subscriptionExpirationDate): self
    {
        $this->subscriptionExpirationDate = $subscriptionExpirationDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSubscriptionExpirationDate(): ?int
    {
        return $this->subscriptionExpirationDate;
    }

    /**
     * @param bool $isRecurring
     * @return static
     */
    public function setIsRecurring(bool $isRecurring): self
    {
        $this->isRecurring = $isRecurring;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsRecurring(): ?bool
    {
        return $this->isRecurring;
    }

    /**
     * @param bool $isFirstRecurring
     * @return static
     */
    public function setIsFirstRecurring(bool $isFirstRecurring): self
    {
        $this->isFirstRecurring = $isFirstRecurring;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFirstRecurring(): ?bool
    {
        return $this->isFirstRecurring;
    }

    /**
     * @param string $shippingOptionId
     * @return static
     */
    public function setShippingOptionId(string $shippingOptionId): self
    {
        $this->shippingOptionId = $shippingOptionId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getShippingOptionId(): ?string
    {
        return $this->shippingOptionId;
    }

    /**
     * @param OrderInfo $orderInfo
     * @return static
     */
    public function setOrderInfo(OrderInfo $orderInfo): self
    {
        $this->orderInfo = $orderInfo;

        return $this;
    }

    /**
     * @return OrderInfo|null
     */
    public function getOrderInfo(): ?OrderInfo
    {
        return $this->orderInfo;
    }

    /**
     * @param string $telegramPaymentChargeId
     * @return static
     */
    public function setTelegramPaymentChargeId(string $telegramPaymentChargeId): self
    {
        $this->telegramPaymentChargeId = $telegramPaymentChargeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getTelegramPaymentChargeId(): string
    {
        return $this->telegramPaymentChargeId;
    }

    /**
     * @param string $providerPaymentChargeId
     * @return static
     */
    public function setProviderPaymentChargeId(string $providerPaymentChargeId): self
    {
        $this->providerPaymentChargeId = $providerPaymentChargeId;

        return $this;
    }

    /**
     * @return string
     */
    public function getProviderPaymentChargeId(): string
    {
        return $this->providerPaymentChargeId;
    }

}