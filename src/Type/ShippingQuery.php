<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#shippingquery
 *
 * This object contains information about an incoming shipping query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ShippingQuery extends AbstractType
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
            'invoice_payload',
            'shipping_address',
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
            'id' => $this->getId(),
            'from' => $this->getFrom(),
            'invoice_payload' => $this->getInvoicePayload(),
            'shipping_address' => $this->getShippingAddress(),
        ];

        return parent::normalizeData($result);
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
     * Bot specified invoice payload 
     *
     * @var string
     * @SerializedName("invoice_payload")
     * @Accessor(getter="getInvoicePayload",setter="setInvoicePayload")
     * @Type("string")
     */
    protected $invoicePayload;

    /**
     * User specified shipping address 
     *
     * @var ShippingAddress
     * @SerializedName("shipping_address")
     * @Accessor(getter="getShippingAddress",setter="setShippingAddress")
     * @Type("MadmagesTelegram\Types\Type\ShippingAddress")
     */
    protected $shippingAddress;


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
     * @param ShippingAddress $shippingAddress
     * @return static
     */
    public function setShippingAddress(ShippingAddress $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return ShippingAddress
     */
    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

}