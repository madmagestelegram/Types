<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#forumtopicedited
 *
 * This object represents a service message about an edited forum topic. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ForumTopicEdited extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'name',
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
            'name' => $this->getName(),
            'icon_custom_emoji_id' => $this->getIconCustomEmojiId(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. New name of the topic, if it was edited 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("name")
     * @Accessor(getter="getName", setter="setName")
     * @Type("string")
     */
    protected $name;

    /**
     * Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was 
     * removed 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("icon_custom_emoji_id")
     * @Accessor(getter="getIconCustomEmojiId", setter="setIconCustomEmojiId")
     * @Type("string")
     */
    protected $iconCustomEmojiId;


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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
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