<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#businessmessagesdeleted
 *
 * This object is received when messages are deleted from a connected business account. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BusinessMessagesDeleted extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'business_connection_id',
            'chat',
            'message_ids',
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
            'business_connection_id' => $this->getBusinessConnectionId(),
            'chat' => $this->getChat(),
            'message_ids' => $this->getMessageIds(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier of the business connection 
     *
     * @var string
     * @SerializedName("business_connection_id")
     * @Accessor(getter="getBusinessConnectionId", setter="setBusinessConnectionId")
     * @Type("string")
     */
    protected $businessConnectionId;

    /**
     * Information about a chat in the business account. The bot may not have access to the chat or the corresponding user. 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * The list of identifiers of deleted messages in the chat of the business account 
     *
     * @var int[]
     * @SerializedName("message_ids")
     * @Accessor(getter="getMessageIds", setter="setMessageIds")
     * @Type("array<int>")
     */
    protected $messageIds;


    /**
     * @param string $businessConnectionId
     * @return static
     */
    public function setBusinessConnectionId(string $businessConnectionId): self
    {
        $this->businessConnectionId = $businessConnectionId;

        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessConnectionId(): string
    {
        return $this->businessConnectionId;
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
     * @param int[] $messageIds
     * @return static
     */
    public function setMessageIds(array $messageIds): self
    {
        $this->messageIds = $messageIds;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getMessageIds(): array
    {
        return $this->messageIds;
    }

}