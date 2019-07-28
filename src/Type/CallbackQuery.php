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
 * message will be present. If the button was attached to a message sent via the bot (in inline mode), the field inline_message_id will be present. Exactly one of the fields data or 
 * game_short_name will be present. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class CallbackQuery extends AbstractType
{
    /**
     * Unique identifier for this query
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setid")
     * @Type("string")
     */
    protected $id;

    /**
     * Sender
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom",setter="setfrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Optional. Message with the callback button that originated the query. Note that message content and message date will not be available if the message is too old
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("message")
     * @Accessor(getter="getMessage",setter="setmessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $message;

    /**
     * Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("inline_message_id")
     * @Accessor(getter="getInlineMessageId",setter="setinlineMessageId")
     * @Type("string")
     */
    protected $inlineMessageId;

    /**
     * Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in games.
     *
     * @var string
     * @SerializedName("chat_instance")
     * @Accessor(getter="getChatInstance",setter="setchatInstance")
     * @Type("string")
     */
    protected $chatInstance;

    /**
     * Optional. Data associated with the callback button. Be aware that a bad client can send arbitrary data in this field.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("data")
     * @Accessor(getter="getData",setter="setdata")
     * @Type("string")
     */
    protected $data;

    /**
     * Optional. Short name of a Game to be returned, serves as the unique identifier for the game
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("game_short_name")
     * @Accessor(getter="getGameShortName",setter="setgameShortName")
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
     * @param Message $message
     * @return static
     */
    public function setMessage(Message $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
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