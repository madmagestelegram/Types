<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#startransactions
 *
 * Contains a list of Telegram Star transactions. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class StarTransactions extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'transactions',
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
            'transactions' => $this->getTransactions(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The list of transactions 
     *
     * @var StarTransaction[]
     * @SerializedName("transactions")
     * @Accessor(getter="getTransactions", setter="setTransactions")
     * @Type("array<MadmagesTelegram\Types\Type\StarTransaction>")
     */
    protected $transactions;


    /**
     * @param StarTransaction[] $transactions
     * @return static
     */
    public function setTransactions(array $transactions): self
    {
        $this->transactions = $transactions;

        return $this;
    }

    /**
     * @return StarTransaction[]
     */
    public function getTransactions(): array
    {
        return $this->transactions;
    }

}