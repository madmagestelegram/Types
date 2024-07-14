<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#refundedpayment
 *
 * This object contains basic information about a refunded payment. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class RefundedPayment extends AbstractType
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
            'telegram_payment_charge_id' => $this->getTelegramPaymentChargeId(),
            'provider_payment_charge_id' => $this->getProviderPaymentChargeId(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars. Currently, always “XTR” 
     *
     * @var string
     * @SerializedName("currency")
     * @Accessor(getter="getCurrency", setter="setCurrency")
     * @Type("string")
     */
    protected $currency;

    /**
     * Total refunded price in the smallest units of the currency (integer, not float/double). For example, for a price of 
     * US$ 1.45, total_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal 
     * point for each currency (2 for the majority of currencies). 
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
     * Telegram payment identifier 
     *
     * @var string
     * @SerializedName("telegram_payment_charge_id")
     * @Accessor(getter="getTelegramPaymentChargeId", setter="setTelegramPaymentChargeId")
     * @Type("string")
     */
    protected $telegramPaymentChargeId;

    /**
     * Optional. Provider payment identifier 
     *
     * @var string|null
     * @SkipWhenEmpty
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
     * @return string|null
     */
    public function getProviderPaymentChargeId(): ?string
    {
        return $this->providerPaymentChargeId;
    }

}