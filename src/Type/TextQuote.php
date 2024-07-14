<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#textquote
 *
 * This object contains information about the quoted part of a message that is replied to by the given message. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class TextQuote extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'text',
            'entities',
            'position',
            'is_manual',
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
            'text' => $this->getText(),
            'entities' => $this->getEntities(),
            'position' => $this->getPosition(),
            'is_manual' => $this->getIsManual(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Text of the quoted part of a message that is replied to by the given message 
     *
     * @var string
     * @SerializedName("text")
     * @Accessor(getter="getText", setter="setText")
     * @Type("string")
     */
    protected $text;

    /**
     * Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough, 
     * spoiler, and custom_emoji entities are kept in quotes. 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("entities")
     * @Accessor(getter="getEntities", setter="setEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $entities;

    /**
     * Approximate quote position in the original message in UTF-16 code units as specified by the sender 
     *
     * @var int
     * @SerializedName("position")
     * @Accessor(getter="getPosition", setter="setPosition")
     * @Type("int")
     */
    protected $position;

    /**
     * Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added 
     * automatically by the server. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_manual")
     * @Accessor(getter="getIsManual", setter="setIsManual")
     * @Type("bool")
     */
    protected $isManual;


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
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param MessageEntity[] $entities
     * @return static
     */
    public function setEntities(array $entities): self
    {
        $this->entities = $entities;

        return $this;
    }

    /**
     * @return MessageEntity[]|null
     */
    public function getEntities(): ?array
    {
        return $this->entities;
    }

    /**
     * @param int $position
     * @return static
     */
    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param bool $isManual
     * @return static
     */
    public function setIsManual(bool $isManual): self
    {
        $this->isManual = $isManual;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsManual(): ?bool
    {
        return $this->isManual;
    }

}