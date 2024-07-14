<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#keyboardbuttonrequestchat
 *
 * This object defines the criteria used to request a suitable chat. Information about the selected chat will be shared 
 * with the bot when the corresponding button is pressed. The bot will be granted requested rights in the chat if appropriate. 
 * More about requesting chats ». 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class KeyboardButtonRequestChat extends AbstractType
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
            'chat_is_channel',
            'chat_is_forum',
            'chat_has_username',
            'chat_is_created',
            'user_administrator_rights',
            'bot_administrator_rights',
            'bot_is_member',
            'request_title',
            'request_username',
            'request_photo',
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
            'chat_is_channel' => $this->getChatIsChannel(),
            'chat_is_forum' => $this->getChatIsForum(),
            'chat_has_username' => $this->getChatHasUsername(),
            'chat_is_created' => $this->getChatIsCreated(),
            'user_administrator_rights' => $this->getUserAdministratorRights(),
            'bot_administrator_rights' => $this->getBotAdministratorRights(),
            'bot_is_member' => $this->getBotIsMember(),
            'request_title' => $this->getRequestTitle(),
            'request_username' => $this->getRequestUsername(),
            'request_photo' => $this->getRequestPhoto(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must be unique within 
     * the message 
     *
     * @var int
     * @SerializedName("request_id")
     * @Accessor(getter="getRequestId", setter="setRequestId")
     * @Type("int")
     */
    protected $requestId;

    /**
     * Pass True to request a channel chat, pass False to request a group or a supergroup chat. 
     *
     * @var bool
     * @SerializedName("chat_is_channel")
     * @Accessor(getter="getChatIsChannel", setter="setChatIsChannel")
     * @Type("bool")
     */
    protected $chatIsChannel;

    /**
     * Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no 
     * additional restrictions are applied. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("chat_is_forum")
     * @Accessor(getter="getChatIsForum", setter="setChatIsForum")
     * @Type("bool")
     */
    protected $chatIsForum;

    /**
     * Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a 
     * username. If not specified, no additional restrictions are applied. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("chat_has_username")
     * @Accessor(getter="getChatHasUsername", setter="setChatHasUsername")
     * @Type("bool")
     */
    protected $chatHasUsername;

    /**
     * Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("chat_is_created")
     * @Accessor(getter="getChatIsCreated", setter="setChatIsCreated")
     * @Type("bool")
     */
    protected $chatIsCreated;

    /**
     * Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights 
     * must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied. 
     *
     * @var ChatAdministratorRights|null
     * @SkipWhenEmpty
     * @SerializedName("user_administrator_rights")
     * @Accessor(getter="getUserAdministratorRights", setter="setUserAdministratorRights")
     * @Type("MadmagesTelegram\Types\Type\ChatAdministratorRights")
     */
    protected $userAdministratorRights;

    /**
     * Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights 
     * must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied. 
     *
     * @var ChatAdministratorRights|null
     * @SkipWhenEmpty
     * @SerializedName("bot_administrator_rights")
     * @Accessor(getter="getBotAdministratorRights", setter="setBotAdministratorRights")
     * @Type("MadmagesTelegram\Types\Type\ChatAdministratorRights")
     */
    protected $botAdministratorRights;

    /**
     * Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("bot_is_member")
     * @Accessor(getter="getBotIsMember", setter="setBotIsMember")
     * @Type("bool")
     */
    protected $botIsMember;

    /**
     * Optional. Pass True to request the chat's title 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_title")
     * @Accessor(getter="getRequestTitle", setter="setRequestTitle")
     * @Type("bool")
     */
    protected $requestTitle;

    /**
     * Optional. Pass True to request the chat's username 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_username")
     * @Accessor(getter="getRequestUsername", setter="setRequestUsername")
     * @Type("bool")
     */
    protected $requestUsername;

    /**
     * Optional. Pass True to request the chat's photo 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_photo")
     * @Accessor(getter="getRequestPhoto", setter="setRequestPhoto")
     * @Type("bool")
     */
    protected $requestPhoto;


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
     * @param bool $chatIsChannel
     * @return static
     */
    public function setChatIsChannel(bool $chatIsChannel): self
    {
        $this->chatIsChannel = $chatIsChannel;

        return $this;
    }

    /**
     * @return bool
     */
    public function getChatIsChannel(): bool
    {
        return $this->chatIsChannel;
    }

    /**
     * @param bool $chatIsForum
     * @return static
     */
    public function setChatIsForum(bool $chatIsForum): self
    {
        $this->chatIsForum = $chatIsForum;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChatIsForum(): ?bool
    {
        return $this->chatIsForum;
    }

    /**
     * @param bool $chatHasUsername
     * @return static
     */
    public function setChatHasUsername(bool $chatHasUsername): self
    {
        $this->chatHasUsername = $chatHasUsername;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChatHasUsername(): ?bool
    {
        return $this->chatHasUsername;
    }

    /**
     * @param bool $chatIsCreated
     * @return static
     */
    public function setChatIsCreated(bool $chatIsCreated): self
    {
        $this->chatIsCreated = $chatIsCreated;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getChatIsCreated(): ?bool
    {
        return $this->chatIsCreated;
    }

    /**
     * @param ChatAdministratorRights $userAdministratorRights
     * @return static
     */
    public function setUserAdministratorRights(ChatAdministratorRights $userAdministratorRights): self
    {
        $this->userAdministratorRights = $userAdministratorRights;

        return $this;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getUserAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->userAdministratorRights;
    }

    /**
     * @param ChatAdministratorRights $botAdministratorRights
     * @return static
     */
    public function setBotAdministratorRights(ChatAdministratorRights $botAdministratorRights): self
    {
        $this->botAdministratorRights = $botAdministratorRights;

        return $this;
    }

    /**
     * @return ChatAdministratorRights|null
     */
    public function getBotAdministratorRights(): ?ChatAdministratorRights
    {
        return $this->botAdministratorRights;
    }

    /**
     * @param bool $botIsMember
     * @return static
     */
    public function setBotIsMember(bool $botIsMember): self
    {
        $this->botIsMember = $botIsMember;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBotIsMember(): ?bool
    {
        return $this->botIsMember;
    }

    /**
     * @param bool $requestTitle
     * @return static
     */
    public function setRequestTitle(bool $requestTitle): self
    {
        $this->requestTitle = $requestTitle;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestTitle(): ?bool
    {
        return $this->requestTitle;
    }

    /**
     * @param bool $requestUsername
     * @return static
     */
    public function setRequestUsername(bool $requestUsername): self
    {
        $this->requestUsername = $requestUsername;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestUsername(): ?bool
    {
        return $this->requestUsername;
    }

    /**
     * @param bool $requestPhoto
     * @return static
     */
    public function setRequestPhoto(bool $requestPhoto): self
    {
        $this->requestPhoto = $requestPhoto;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestPhoto(): ?bool
    {
        return $this->requestPhoto;
    }

}