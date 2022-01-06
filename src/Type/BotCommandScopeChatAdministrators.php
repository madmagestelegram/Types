<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#botcommandscopechatadministrators
 *
 * Represents the scope of bot commands, covering all administrators of a specific 
 * group or supergroup chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BotCommandScopeChatAdministrators extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'type',
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
            'type' => $this->getType(),
            'chat_id' => $this->getChatId(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Scope type, must be chat_administrators 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Unique identifier for the target chat or username of the target supergroup (in the format @|supergroupusername) 
     *
     * @var int|string
     * @SerializedName("chat_id")
     * @Accessor(getter="getChatId",setter="setChatId")
     * @Type("string")
     */
    protected $chatId;


    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param int|string $chatId
     * @return static
     */
    public function setChatId( $chatId): self
    {
        $this->chatId = $chatId;

        return $this;
    }

    /**
     * @return int|string
     */
    public function getChatId()
    {
        return $this->chatId;
    }

}