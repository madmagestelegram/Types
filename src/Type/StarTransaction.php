<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#startransaction
 *
 * Describes a Telegram Star transaction. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class StarTransaction extends AbstractType
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
            'amount',
            'date',
            'source',
            'receiver',
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
            'amount' => $this->getAmount(),
            'date' => $this->getDate(),
            'source' => $this->getSource(),
            'receiver' => $this->getReceiver(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier of the transaction. Coincides with the identifer of the original transaction for refund 
     * transactions. Coincides with SuccessfulPayment.telegram_payment_charge_id for successful incoming payments from users. 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId", setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * Number of Telegram Stars transferred by the transaction 
     *
     * @var int
     * @SerializedName("amount")
     * @Accessor(getter="getAmount", setter="setAmount")
     * @Type("int")
     */
    protected $amount;

    /**
     * Date the transaction was created in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate", setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * Optional. Source of an incoming transaction (e.g., a user purchasing goods or services, Fragment refunding a 
     * failed withdrawal). Only for incoming transactions 
     *
     * @var AbstractTransactionPartner|null
     * @SkipWhenEmpty
     * @SerializedName("source")
     * @Accessor(getter="getSource", setter="setSource")
     * @Type("MadmagesTelegram\Types\Type\AbstractTransactionPartner")
     */
    protected $source;

    /**
     * Optional. Receiver of an outgoing transaction (e.g., a user for a purchase refund, Fragment for a withdrawal). Only 
     * for outgoing transactions 
     *
     * @var AbstractTransactionPartner|null
     * @SkipWhenEmpty
     * @SerializedName("receiver")
     * @Accessor(getter="getReceiver", setter="setReceiver")
     * @Type("MadmagesTelegram\Types\Type\AbstractTransactionPartner")
     */
    protected $receiver;


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
     * @param int $date
     * @return static
     */
    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param AbstractTransactionPartner $source
     * @return static
     */
    public function setSource(AbstractTransactionPartner $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return AbstractTransactionPartner|null
     */
    public function getSource(): ?AbstractTransactionPartner
    {
        return $this->source;
    }

    /**
     * @param AbstractTransactionPartner $receiver
     * @return static
     */
    public function setReceiver(AbstractTransactionPartner $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * @return AbstractTransactionPartner|null
     */
    public function getReceiver(): ?AbstractTransactionPartner
    {
        return $this->receiver;
    }

}