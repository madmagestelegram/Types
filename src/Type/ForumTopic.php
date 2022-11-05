<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#forumtopic
 *
 * This object represents a forum topic. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ForumTopic extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'message_thread_id',
            'name',
            'icon_color',
            'icon_custom_emoji_id',
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
            'message_thread_id' => $this->getMessageThreadId(),
            'name' => $this->getName(),
            'icon_color' => $this->getIconColor(),
            'icon_custom_emoji_id' => $this->getIconCustomEmojiId(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier of the forum topic 
     *
     * @var int
     * @SerializedName("message_thread_id")
     * @Accessor(getter="getMessageThreadId", setter="setMessageThreadId")
     * @Type("int")
     */
    protected $messageThreadId;

    /**
     * Name of the topic 
     *
     * @var string
     * @SerializedName("name")
     * @Accessor(getter="getName", setter="setName")
     * @Type("string")
     */
    protected $name;

    /**
     * Color of the topic icon in RGB format 
     *
     * @var int
     * @SerializedName("icon_color")
     * @Accessor(getter="getIconColor", setter="setIconColor")
     * @Type("int")
     */
    protected $iconColor;

    /**
     * Optional. Unique identifier of the custom emoji shown as the topic icon 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("icon_custom_emoji_id")
     * @Accessor(getter="getIconCustomEmojiId", setter="setIconCustomEmojiId")
     * @Type("string")
     */
    protected $iconCustomEmojiId;


    /**
     * @param int $messageThreadId
     * @return static
     */
    public function setMessageThreadId(int $messageThreadId): self
    {
        $this->messageThreadId = $messageThreadId;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessageThreadId(): int
    {
        return $this->messageThreadId;
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $iconColor
     * @return static
     */
    public function setIconColor(int $iconColor): self
    {
        $this->iconColor = $iconColor;

        return $this;
    }

    /**
     * @return int
     */
    public function getIconColor(): int
    {
        return $this->iconColor;
    }

    /**
     * @param string $iconCustomEmojiId
     * @return static
     */
    public function setIconCustomEmojiId(string $iconCustomEmojiId): self
    {
        $this->iconCustomEmojiId = $iconCustomEmojiId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIconCustomEmojiId(): ?string
    {
        return $this->iconCustomEmojiId;
    }

}