<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#callbackquery
 *
 * This object represents an incoming callback query from a callback button in an inline keyboard. If the button that originated the query was attached to a message sent by the bot, the field 
 * message will be present. If the button was attached to a message sent via the bot (in inline 
 * mode), the field inline_message_id will be present. Exactly one of the fields data or 
 * game_short_name will be present. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class CallbackQuery extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'id',
            'from',
            'message',
            'inline_message_id',
            'chat_instance',
            'data',
            'game_short_name',
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
            'id' => $this->getId(),
            'from' => $this->getFrom(),
            'message' => $this->getMessage(),
            'inline_message_id' => $this->getInlineMessageId(),
            'chat_instance' => $this->getChatInstance(),
            'data' => $this->getData(),
            'game_short_name' => $this->getGameShortName(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier for this query 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId", setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * Sender 
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom", setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Optional. Message sent by the bot with the callback button that originated the query 
     *
     * @var AbstractMaybeInaccessibleMessage|null
     * @SkipWhenEmpty
     * @SerializedName("message")
     * @Accessor(getter="getMessage", setter="setMessage")
     * @Type("MadmagesTelegram\Types\Type\AbstractMaybeInaccessibleMessage")
     */
    protected $message;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode, that originated the query. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("inline_message_id")
     * @Accessor(getter="getInlineMessageId", setter="setInlineMessageId")
     * @Type("string")
     */
    protected $inlineMessageId;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. 
     * Useful for high scores in games. 
     *
     * @var string
     * @SerializedName("chat_instance")
     * @Accessor(getter="getChatInstance", setter="setChatInstance")
     * @Type("string")
     */
    protected $chatInstance;

    /**
     * Optional. Data associated with the callback button. Be aware that the message originated the query can contain no 
     * callback buttons with this data. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("data")
     * @Accessor(getter="getData", setter="setData")
     * @Type("string")
     */
    protected $data;

    /**
     * Optional. Short name of a Game to be returned, serves as the unique identifier for the game 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("game_short_name")
     * @Accessor(getter="getGameShortName", setter="setGameShortName")
     * @Type("string")
     */
    protected $gameShortName;


    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param User $from
     * @return static
     */
    public function setFrom(User $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param AbstractMaybeInaccessibleMessage $message
     * @return static
     */
    public function setMessage(AbstractMaybeInaccessibleMessage $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return AbstractMaybeInaccessibleMessage|null
     */
    public function getMessage(): ?AbstractMaybeInaccessibleMessage
    {
        return $this->message;
    }

    /**
     * @param string $inlineMessageId
     * @return static
     */
    public function setInlineMessageId(string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string $chatInstance
     * @return static
     */
    public function setChatInstance(string $chatInstance): self
    {
        $this->chatInstance = $chatInstance;

        return $this;
    }

    /**
     * @return string
     */
    public function getChatInstance(): string
    {
        return $this->chatInstance;
    }

    /**
     * @param string $data
     * @return static
     */
    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string $gameShortName
     * @return static
     */
    public function setGameShortName(string $gameShortName): self
    {
        $this->gameShortName = $gameShortName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getGameShortName(): ?string
    {
        return $this->gameShortName;
    }

}