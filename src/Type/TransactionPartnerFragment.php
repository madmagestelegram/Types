<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#transactionpartnerfragment
 *
 * Describes a withdrawal transaction with Fragment. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class TransactionPartnerFragment extends AbstractTransactionPartner
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
            'withdrawal_state',
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
            'withdrawal_state' => $this->getWithdrawalState(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the transaction partner, always “fragment” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Optional. State of the transaction if the transaction is outgoing 
     *
     * @var AbstractRevenueWithdrawalState|null
     * @SkipWhenEmpty
     * @SerializedName("withdrawal_state")
     * @Accessor(getter="getWithdrawalState", setter="setWithdrawalState")
     * @Type("MadmagesTelegram\Types\Type\AbstractRevenueWithdrawalState")
     */
    protected $withdrawalState;


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
     * @param AbstractRevenueWithdrawalState $withdrawalState
     * @return static
     */
    public function setWithdrawalState(AbstractRevenueWithdrawalState $withdrawalState): self
    {
        $this->withdrawalState = $withdrawalState;

        return $this;
    }

    /**
     * @return AbstractRevenueWithdrawalState|null
     */
    public function getWithdrawalState(): ?AbstractRevenueWithdrawalState
    {
        return $this->withdrawalState;
    }

}