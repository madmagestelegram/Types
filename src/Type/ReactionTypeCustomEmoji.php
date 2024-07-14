<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#reactiontypecustomemoji
 *
 * The reaction is based on a custom emoji. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ReactionTypeCustomEmoji extends AbstractReactionType
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
            'custom_emoji_id',
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
            'custom_emoji_id' => $this->getCustomEmojiId(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the reaction, always “custom_emoji” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Custom emoji identifier 
     *
     * @var string
     * @SerializedName("custom_emoji_id")
     * @Accessor(getter="getCustomEmojiId", setter="setCustomEmojiId")
     * @Type("string")
     */
    protected $customEmojiId;


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
     * @param string $customEmojiId
     * @return static
     */
    public function setCustomEmojiId(string $customEmojiId): self
    {
        $this->customEmojiId = $customEmojiId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCustomEmojiId(): string
    {
        return $this->customEmojiId;
    }

}