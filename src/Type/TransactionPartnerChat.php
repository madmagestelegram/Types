<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#transactionpartnerchat
 *
 * Describes a transaction with a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class TransactionPartnerChat extends AbstractType
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
            'chat',
            'gift',
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
            'chat' => $this->getChat(),
            'gift' => $this->getGift(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the transaction partner, always “chat” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Information about the chat 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * Optional. The gift sent to the chat by the bot 
     *
     * @var Gift|null
     * @SkipWhenEmpty
     * @SerializedName("gift")
     * @Accessor(getter="getGift", setter="setGift")
     * @Type("MadmagesTelegram\Types\Type\Gift")
     */
    protected $gift;


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
     * @param Gift $gift
     * @return static
     */
    public function setGift(Gift $gift): self
    {
        $this->gift = $gift;

        return $this;
    }

    /**
     * @return Gift|null
     */
    public function getGift(): ?Gift
    {
        return $this->gift;
    }

}