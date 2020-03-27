<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#precheckoutquery
 *
 * This object contains information about an incoming pre-checkout query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PreCheckoutQuery extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'id',
            'from',
            'currency',
            'total_amount',
            'invoice_payload',
            'shipping_option_id',
            'order_info',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getRawData(): array
    {
        $result = [
            'id' => $this->getId(),
            'from' => $this->getFrom(),
            'currency' => $this->getCurrency(),
            'total_amount' => $this->getTotalAmount(),
            'invoice_payload' => $this->getInvoicePayload(),
            'shipping_option_id' => $this->getShippingOptionId(),
            'order_info' => $this->getOrderInfo(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Unique query identifier 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * User who sent the query 
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom",setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Three-letter ISO 4217 currency code 
     *
     * @var string
     * @SerializedName("currency")
     * @Accessor(getter="getCurrency",setter="setCurrency")
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
     * @Accessor(getter="getTotalAmount",setter="setTotalAmount")
     * @Type("int")
     */
    protected $totalAmount;

    /**
     * Bot specified invoice payload 
     *
     * @var string
     * @SerializedName("invoice_payload")
     * @Accessor(getter="getInvoicePayload",setter="setInvoicePayload")
     * @Type("string")
     */
    protected $invoicePayload;

    /**
     * Optional. Identifier of the shipping option chosen by the user 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("shipping_option_id")
     * @Accessor(getter="getShippingOptionId",setter="setShippingOptionId")
     * @Type("string")
     */
    protected $shippingOptionId;

    /**
     * Optional. Order info provided by the user 
     *
     * @var OrderInfo|null
     * @SkipWhenEmpty
     * @SerializedName("order_info")
     * @Accessor(getter="getOrderInfo",setter="setOrderInfo")
     * @Type("MadmagesTelegram\Types\Type\OrderInfo")
     */
    protected $orderInfo;


    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param User $from
     * @return static
     */
    public function setFrom(User $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

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

}