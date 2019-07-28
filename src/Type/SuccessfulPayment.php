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
 * This object contains basic information about a successful payment. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class SuccessfulPayment extends AbstractType
{
    /**
     * Three-letter ISO 4217 currency code
     *
     * @var string
     * @SerializedName("currency")
     * @Accessor(getter="getCurrency",setter="setcurrency")
     * @Type("string")
     */
    protected $currency;

    /**
     * Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     *
     * @var int
     * @SerializedName("total_amount")
     * @Accessor(getter="getTotalAmount",setter="settotalAmount")
     * @Type("int")
     */
    protected $totalAmount;

    /**
     * Bot specified invoice payload
     *
     * @var string
     * @SerializedName("invoice_payload")
     * @Accessor(getter="getInvoicePayload",setter="setinvoicePayload")
     * @Type("string")
     */
    protected $invoicePayload;

    /**
     * Optional. Identifier of the shipping option chosen by the user
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("shipping_option_id")
     * @Accessor(getter="getShippingOptionId",setter="setshippingOptionId")
     * @Type("string")
     */
    protected $shippingOptionId;

    /**
     * Optional. Order info provided by the user
     *
     * @var OrderInfo|null
     * @SkipWhenEmpty
     * @SerializedName("order_info")
     * @Accessor(getter="getOrderInfo",setter="setorderInfo")
     * @Type("MadmagesTelegram\Types\Type\OrderInfo")
     */
    protected $orderInfo;

    /**
     * Telegram payment identifier
     *
     * @var string
     * @SerializedName("telegram_payment_charge_id")
     * @Accessor(getter="getTelegramPaymentChargeId",setter="settelegramPaymentChargeId")
     * @Type("string")
     */
    protected $telegramPaymentChargeId;

    /**
     * Provider payment identifier
     *
     * @var string
     * @SerializedName("provider_payment_charge_id")
     * @Accessor(getter="getProviderPaymentChargeId",setter="setproviderPaymentChargeId")
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