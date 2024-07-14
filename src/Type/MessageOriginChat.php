<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#messageoriginchat
 *
 * The message was originally sent on behalf of a chat to a group chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MessageOriginChat extends AbstractMessageOrigin
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
            'date',
            'sender_chat',
            'author_signature',
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
            'date' => $this->getDate(),
            'sender_chat' => $this->getSenderChat(),
            'author_signature' => $this->getAuthorSignature(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the message origin, always “chat” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Date the message was sent originally in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate", setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * Chat that sent the message originally 
     *
     * @var Chat
     * @SerializedName("sender_chat")
     * @Accessor(getter="getSenderChat", setter="setSenderChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $senderChat;

    /**
     * Optional. For messages originally sent by an anonymous chat administrator, original message author signature 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("author_signature")
     * @Accessor(getter="getAuthorSignature", setter="setAuthorSignature")
     * @Type("string")
     */
    protected $authorSignature;


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
     * @param Chat $senderChat
     * @return static
     */
    public function setSenderChat(Chat $senderChat): self
    {
        $this->senderChat = $senderChat;

        return $this;
    }

    /**
     * @return Chat
     */
    public function getSenderChat(): Chat
    {
        return $this->senderChat;
    }

    /**
     * @param string $authorSignature
     * @return static
     */
    public function setAuthorSignature(string $authorSignature): self
    {
        $this->authorSignature = $authorSignature;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAuthorSignature(): ?string
    {
        return $this->authorSignature;
    }

}