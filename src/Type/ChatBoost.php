<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatboost
 *
 * This object contains information about a chat boost. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatBoost extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'boost_id',
            'add_date',
            'expiration_date',
            'source',
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
            'boost_id' => $this->getBoostId(),
            'add_date' => $this->getAddDate(),
            'expiration_date' => $this->getExpirationDate(),
            'source' => $this->getSource(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier of the boost 
     *
     * @var string
     * @SerializedName("boost_id")
     * @Accessor(getter="getBoostId", setter="setBoostId")
     * @Type("string")
     */
    protected $boostId;

    /**
     * Point in time (Unix timestamp) when the chat was boosted 
     *
     * @var int
     * @SerializedName("add_date")
     * @Accessor(getter="getAddDate", setter="setAddDate")
     * @Type("int")
     */
    protected $addDate;

    /**
     * Point in time (Unix timestamp) when the boost will automatically expire, unless the booster's Telegram Premium 
     * subscription is prolonged 
     *
     * @var int
     * @SerializedName("expiration_date")
     * @Accessor(getter="getExpirationDate", setter="setExpirationDate")
     * @Type("int")
     */
    protected $expirationDate;

    /**
     * Source of the added boost 
     *
     * @var AbstractChatBoostSource
     * @SerializedName("source")
     * @Accessor(getter="getSource", setter="setSource")
     * @Type("MadmagesTelegram\Types\Type\AbstractChatBoostSource")
     */
    protected $source;


    /**
     * @param string $boostId
     * @return static
     */
    public function setBoostId(string $boostId): self
    {
        $this->boostId = $boostId;

        return $this;
    }

    /**
     * @return string
     */
    public function getBoostId(): string
    {
        return $this->boostId;
    }

    /**
     * @param int $addDate
     * @return static
     */
    public function setAddDate(int $addDate): self
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getAddDate(): int
    {
        return $this->addDate;
    }

    /**
     * @param int $expirationDate
     * @return static
     */
    public function setExpirationDate(int $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationDate(): int
    {
        return $this->expirationDate;
    }

    /**
     * @param AbstractChatBoostSource $source
     * @return static
     */
    public function setSource(AbstractChatBoostSource $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return AbstractChatBoostSource
     */
    public function getSource(): AbstractChatBoostSource
    {
        return $this->source;
    }

}