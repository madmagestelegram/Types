<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#user
 *
 * This object represents a Telegram user or bot. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class User extends AbstractType
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
            'is_bot',
            'first_name',
            'last_name',
            'username',
            'language_code',
            'can_join_groups',
            'can_read_all_group_messages',
            'supports_inline_queries',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getRawData(): array
    {
        $result = [
            'id' => $this->getId(),
            'is_bot' => $this->getIsBot(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'username' => $this->getUsername(),
            'language_code' => $this->getLanguageCode(),
            'can_join_groups' => $this->getCanJoinGroups(),
            'can_read_all_group_messages' => $this->getCanReadAllGroupMessages(),
            'supports_inline_queries' => $this->getSupportsInlineQueries(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Unique identifier for this user or bot 
     *
     * @var int
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setId")
     * @Type("int")
     */
    protected $id;

    /**
     * True, if this user is a bot 
     *
     * @var bool
     * @SerializedName("is_bot")
     * @Accessor(getter="getIsBot",setter="setIsBot")
     * @Type("bool")
     */
    protected $isBot;

    /**
     * User's or bot's first name 
     *
     * @var string
     * @SerializedName("first_name")
     * @Accessor(getter="getFirstName",setter="setFirstName")
     * @Type("string")
     */
    protected $firstName;

    /**
     * Optional. User's or bot's last name 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("last_name")
     * @Accessor(getter="getLastName",setter="setLastName")
     * @Type("string")
     */
    protected $lastName;

    /**
     * Optional. User's or bot's username 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("username")
     * @Accessor(getter="getUsername",setter="setUsername")
     * @Type("string")
     */
    protected $username;

    /**
     * Optional. IETF language tag of the user's language 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("language_code")
     * @Accessor(getter="getLanguageCode",setter="setLanguageCode")
     * @Type("string")
     */
    protected $languageCode;

    /**
     * Optional. True, if the bot can be invited to groups. Returned only in getMe. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_join_groups")
     * @Accessor(getter="getCanJoinGroups",setter="setCanJoinGroups")
     * @Type("bool")
     */
    protected $canJoinGroups;

    /**
     * Optional. True, if privacy mode is disabled for the bot. Returned only in getMe. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_read_all_group_messages")
     * @Accessor(getter="getCanReadAllGroupMessages",setter="setCanReadAllGroupMessages")
     * @Type("bool")
     */
    protected $canReadAllGroupMessages;

    /**
     * Optional. True, if the bot supports inline queries. Returned only in getMe. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("supports_inline_queries")
     * @Accessor(getter="getSupportsInlineQueries",setter="setSupportsInlineQueries")
     * @Type("bool")
     */
    protected $supportsInlineQueries;


    /**
     * @param int $id
     * @return static
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param bool $isBot
     * @return static
     */
    public function setIsBot(bool $isBot): self
    {
        $this->isBot = $isBot;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBot(): bool
    {
        return $this->isBot;
    }

    /**
     * @param string $firstName
     * @return static
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     * @return static
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
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
     * @param string $languageCode
     * @return static
     */
    public function setLanguageCode(string $languageCode): self
    {
        $this->languageCode = $languageCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    /**
     * @param bool $canJoinGroups
     * @return static
     */
    public function setCanJoinGroups(bool $canJoinGroups): self
    {
        $this->canJoinGroups = $canJoinGroups;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanJoinGroups(): ?bool
    {
        return $this->canJoinGroups;
    }

    /**
     * @param bool $canReadAllGroupMessages
     * @return static
     */
    public function setCanReadAllGroupMessages(bool $canReadAllGroupMessages): self
    {
        $this->canReadAllGroupMessages = $canReadAllGroupMessages;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanReadAllGroupMessages(): ?bool
    {
        return $this->canReadAllGroupMessages;
    }

    /**
     * @param bool $supportsInlineQueries
     * @return static
     */
    public function setSupportsInlineQueries(bool $supportsInlineQueries): self
    {
        $this->supportsInlineQueries = $supportsInlineQueries;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSupportsInlineQueries(): ?bool
    {
        return $this->supportsInlineQueries;
    }

}