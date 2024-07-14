<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatboostupdated
 *
 * This object represents a boost added to a chat or changed. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatBoostUpdated extends AbstractType
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
            'boost',
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
            'boost' => $this->getBoost(),
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
     * Information about the chat boost 
     *
     * @var ChatBoost
     * @SerializedName("boost")
     * @Accessor(getter="getBoost", setter="setBoost")
     * @Type("MadmagesTelegram\Types\Type\ChatBoost")
     */
    protected $boost;


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
     * @param ChatBoost $boost
     * @return static
     */
    public function setBoost(ChatBoost $boost): self
    {
        $this->boost = $boost;

        return $this;
    }

    /**
     * @return ChatBoost
     */
    public function getBoost(): ChatBoost
    {
        return $this->boost;
    }

}