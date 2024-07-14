<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatboostremoved
 *
 * This object represents a boost removed from a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatBoostRemoved extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'chat',
            'boost_id',
            'remove_date',
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
            'chat' => $this->getChat(),
            'boost_id' => $this->getBoostId(),
            'remove_date' => $this->getRemoveDate(),
            'source' => $this->getSource(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Chat which was boosted 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

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
     * Point in time (Unix timestamp) when the boost was removed 
     *
     * @var int
     * @SerializedName("remove_date")
     * @Accessor(getter="getRemoveDate", setter="setRemoveDate")
     * @Type("int")
     */
    protected $removeDate;

    /**
     * Source of the removed boost 
     *
     * @var AbstractChatBoostSource
     * @SerializedName("source")
     * @Accessor(getter="getSource", setter="setSource")
     * @Type("MadmagesTelegram\Types\Type\AbstractChatBoostSource")
     */
    protected $source;


    /**
     * @param Chat $chat
     * @return static
     */
    public function setChat(Chat $chat): self
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }

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
     * @param int $removeDate
     * @return static
     */
    public function setRemoveDate(int $removeDate): self
    {
        $this->removeDate = $removeDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getRemoveDate(): int
    {
        return $this->removeDate;
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