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
 * This object contains information about a chat that was shared with the bot using a KeyboardButtonRequestChat button. 
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
            'title',
            'username',
            'photo',
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
            'title' => $this->getTitle(),
            'username' => $this->getUsername(),
            'photo' => $this->getPhoto(),
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
     * Optional. Title of the chat, if the title was requested by the bot. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Username of the chat, if the username was requested by the bot and available. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("username")
     * @Accessor(getter="getUsername", setter="setUsername")
     * @Type("string")
     */
    protected $username;

    /**
     * Optional. Available sizes of the chat photo, if the photo was requested by the bot 
     *
     * @var PhotoSize[]|null
     * @SkipWhenEmpty
     * @SerializedName("photo")
     * @Accessor(getter="getPhoto", setter="setPhoto")
     * @Type("array<MadmagesTelegram\Types\Type\PhotoSize>")
     */
    protected $photo;


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

    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $username
     * @return static
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param PhotoSize[] $photo
     * @return static
     */
    public function setPhoto(array $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

}