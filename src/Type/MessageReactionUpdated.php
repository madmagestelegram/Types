<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#messagereactionupdated
 *
 * This object represents a change of a reaction on a message performed by a user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MessageReactionUpdated extends AbstractType
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
            'user',
            'actor_chat',
            'date',
            'old_reaction',
            'new_reaction',
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
            'user' => $this->getUser(),
            'actor_chat' => $this->getActorChat(),
            'date' => $this->getDate(),
            'old_reaction' => $this->getOldReaction(),
            'new_reaction' => $this->getNewReaction(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The chat containing the message the user reacted to 
     *
     * @var Chat
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * Unique identifier of the message inside the chat 
     *
     * @var int
     * @SerializedName("message_id")
     * @Accessor(getter="getMessageId", setter="setMessageId")
     * @Type("int")
     */
    protected $messageId;

    /**
     * Optional. The user that changed the reaction, if the user isn't anonymous 
     *
     * @var User|null
     * @SkipWhenEmpty
     * @SerializedName("user")
     * @Accessor(getter="getUser", setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * Optional. The chat on behalf of which the reaction was changed, if the user is anonymous 
     *
     * @var Chat|null
     * @SkipWhenEmpty
     * @SerializedName("actor_chat")
     * @Accessor(getter="getActorChat", setter="setActorChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $actorChat;

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
     * Previous list of reaction types that were set by the user 
     *
     * @var AbstractReactionType[]
     * @SerializedName("old_reaction")
     * @Accessor(getter="getOldReaction", setter="setOldReaction")
     * @Type("array<MadmagesTelegram\Types\Type\AbstractReactionType>")
     */
    protected $oldReaction;

    /**
     * New list of reaction types that have been set by the user 
     *
     * @var AbstractReactionType[]
     * @SerializedName("new_reaction")
     * @Accessor(getter="getNewReaction", setter="setNewReaction")
     * @Type("array<MadmagesTelegram\Types\Type\AbstractReactionType>")
     */
    protected $newReaction;


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
     * @param User $user
     * @return static
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param Chat $actorChat
     * @return static
     */
    public function setActorChat(Chat $actorChat): self
    {
        $this->actorChat = $actorChat;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getActorChat(): ?Chat
    {
        return $this->actorChat;
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
     * @param AbstractReactionType[] $oldReaction
     * @return static
     */
    public function setOldReaction(array $oldReaction): self
    {
        $this->oldReaction = $oldReaction;

        return $this;
    }

    /**
     * @return AbstractReactionType[]
     */
    public function getOldReaction(): array
    {
        return $this->oldReaction;
    }

    /**
     * @param AbstractReactionType[] $newReaction
     * @return static
     */
    public function setNewReaction(array $newReaction): self
    {
        $this->newReaction = $newReaction;

        return $this;
    }

    /**
     * @return AbstractReactionType[]
     */
    public function getNewReaction(): array
    {
        return $this->newReaction;
    }

}