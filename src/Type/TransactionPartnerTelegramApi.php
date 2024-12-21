<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#transactionpartnertelegramapi
 *
 * Describes a transaction with payment for paid broadcasting. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class TransactionPartnerTelegramApi extends AbstractType
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
            'request_count',
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
            'request_count' => $this->getRequestCount(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the transaction partner, always “telegram_api” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * The number of successful requests that exceeded regular limits and were therefore billed 
     *
     * @var int
     * @SerializedName("request_count")
     * @Accessor(getter="getRequestCount", setter="setRequestCount")
     * @Type("int")
     */
    protected $requestCount;


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
     * @param int $requestCount
     * @return static
     */
    public function setRequestCount(int $requestCount): self
    {
        $this->requestCount = $requestCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getRequestCount(): int
    {
        return $this->requestCount;
    }

}