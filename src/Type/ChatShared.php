<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatshared
 *
 * This object contains information about the chat whose identifier was shared with the bot using a KeyboardButtonRequestChat button. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatShared extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'request_id',
            'chat_id',
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
            'request_id' => $this->getRequestId(),
            'chat_id' => $this->getChatId(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Identifier of the request 
     *
     * @var int
     * @SerializedName("request_id")
     * @Accessor(getter="getRequestId", setter="setRequestId")
     * @Type("int")
     */
    protected $requestId;

    /**
     * Identifier of the shared chat. This number may have more than 32 significant bits and some programming languages may 
     * have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or 
     * double-precision float type are safe for storing this identifier. The bot may not have access to the chat and could be unable to use this 
     * identifier, unless the chat is already known to the bot by some other means. 
     *
     * @var int
     * @SerializedName("chat_id")
     * @Accessor(getter="getChatId", setter="setChatId")
     * @Type("int")
     */
    protected $chatId;


    /**
     * @param int $requestId
     * @return static
     */
    public function setRequestId(int $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @param int $chatId
     * @return static
     */
    public function setChatId(int $chatId): self
    {
        $this->chatId = $chatId;

        return $this;
    }

    /**
     * @return int
     */
    public function getChatId(): int
    {
        return $this->chatId;
    }

}