<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#switchinlinequerychosenchat
 *
 * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an 
 * optional default inline query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class SwitchInlineQueryChosenChat extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'query',
            'allow_user_chats',
            'allow_bot_chats',
            'allow_group_chats',
            'allow_channel_chats',
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
            'query' => $this->getQuery(),
            'allow_user_chats' => $this->getAllowUserChats(),
            'allow_bot_chats' => $this->getAllowBotChats(),
            'allow_group_chats' => $this->getAllowGroupChats(),
            'allow_channel_chats' => $this->getAllowChannelChats(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be 
     * inserted 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("query")
     * @Accessor(getter="getQuery", setter="setQuery")
     * @Type("string")
     */
    protected $query;

    /**
     * Optional. True, if private chats with users can be chosen 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("allow_user_chats")
     * @Accessor(getter="getAllowUserChats", setter="setAllowUserChats")
     * @Type("bool")
     */
    protected $allowUserChats;

    /**
     * Optional. True, if private chats with bots can be chosen 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("allow_bot_chats")
     * @Accessor(getter="getAllowBotChats", setter="setAllowBotChats")
     * @Type("bool")
     */
    protected $allowBotChats;

    /**
     * Optional. True, if group and supergroup chats can be chosen 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("allow_group_chats")
     * @Accessor(getter="getAllowGroupChats", setter="setAllowGroupChats")
     * @Type("bool")
     */
    protected $allowGroupChats;

    /**
     * Optional. True, if channel chats can be chosen 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("allow_channel_chats")
     * @Accessor(getter="getAllowChannelChats", setter="setAllowChannelChats")
     * @Type("bool")
     */
    protected $allowChannelChats;


    /**
     * @param string $query
     * @return static
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuery(): ?string
    {
        return $this->query;
    }

    /**
     * @param bool $allowUserChats
     * @return static
     */
    public function setAllowUserChats(bool $allowUserChats): self
    {
        $this->allowUserChats = $allowUserChats;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowUserChats(): ?bool
    {
        return $this->allowUserChats;
    }

    /**
     * @param bool $allowBotChats
     * @return static
     */
    public function setAllowBotChats(bool $allowBotChats): self
    {
        $this->allowBotChats = $allowBotChats;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowBotChats(): ?bool
    {
        return $this->allowBotChats;
    }

    /**
     * @param bool $allowGroupChats
     * @return static
     */
    public function setAllowGroupChats(bool $allowGroupChats): self
    {
        $this->allowGroupChats = $allowGroupChats;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowGroupChats(): ?bool
    {
        return $this->allowGroupChats;
    }

    /**
     * @param bool $allowChannelChats
     * @return static
     */
    public function setAllowChannelChats(bool $allowChannelChats): self
    {
        $this->allowChannelChats = $allowChannelChats;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAllowChannelChats(): ?bool
    {
        return $this->allowChannelChats;
    }

}