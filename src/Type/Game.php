<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#game
 *
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique 
 * identifiers. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Game extends AbstractType
{
    /**
     * Title of the game
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="settitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Description of the game
     *
     * @var string
     * @SerializedName("description")
     * @Accessor(getter="getDescription",setter="setdescription")
     * @Type("string")
     */
    protected $description;

    /**
     * Photo that will be displayed in the game message in chats.
     *
     * @var PhotoSize[]
     * @SerializedName("photo")
     * @Accessor(getter="getPhoto",setter="setphoto")
     * @Type("array<MadmagesTelegram\Types\Type\PhotoSize>")
     */
    protected $photo;

    /**
     * Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("text")
     * @Accessor(getter="getText",setter="settext")
     * @Type("string")
     */
    protected $text;

    /**
     * Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("text_entities")
     * @Accessor(getter="getTextEntities",setter="settextEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $textEntities;

    /**
     * Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
     *
     * @var Animation|null
     * @SkipWhenEmpty
     * @SerializedName("animation")
     * @Accessor(getter="getAnimation",setter="setanimation")
     * @Type("MadmagesTelegram\Types\Type\Animation")
     */
    protected $animation;


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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $description
     * @return static
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
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
     * @return PhotoSize[]
     */
    public function getPhoto(): array
    {
        return $this->photo;
    }

    /**
     * @param string $text
     * @return static
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param MessageEntity[] $textEntities
     * @return static
     */
    public function setTextEntities(array $textEntities): self
    {
        $this->textEntities = $textEntities;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getTextEntities(): ?array
    {
        return $this->textEntities;
    }

    /**
     * @param Animation $animation
     * @return static
     */
    public function setAnimation(Animation $animation): self
    {
        $this->animation = $animation;

        return $this;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

}