<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#messagereactioncountupdated
 *
 * This object represents reaction changes on a message with anonymous reactions. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MessageReactionCountUpdated extends AbstractType
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
            'message_id',
            'date',
            'reactions',
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
            'message_id' => $this->getMessageId(),
            'date' => $this->getDate(),
            'reactions' => $this->getReactions(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The chat containing the message 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * Unique message identifier inside the chat 
     *
     * @var int
     * @SerializedName("message_id")
     * @Accessor(getter="getMessageId", setter="setMessageId")
     * @Type("int")
     */
    protected $messageId;

    /**
     * Date of the change in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate", setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * List of reactions that are present on the message 
     *
     * @var ReactionCount[]
     * @SerializedName("reactions")
     * @Accessor(getter="getReactions", setter="setReactions")
     * @Type("array<MadmagesTelegram\Types\Type\ReactionCount>")
     */
    protected $reactions;


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
     * @param int $messageId
     * @return static
     */
    public function setMessageId(int $messageId): self
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId;
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
     * @param ReactionCount[] $reactions
     * @return static
     */
    public function setReactions(array $reactions): self
    {
        $this->reactions = $reactions;

        return $this;
    }

    /**
     * @return ReactionCount[]
     */
    public function getReactions(): array
    {
        return $this->reactions;
    }

}