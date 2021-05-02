<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#dice
 *
 * This object represents an animated emoji that displays a random value. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Dice extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'emoji',
            'value',
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
            'emoji' => $this->getEmoji(),
            'value' => $this->getValue(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Emoji on which the dice throw animation is based 
     *
     * @var string
     * @SerializedName("emoji")
     * @Accessor(getter="getEmoji",setter="setEmoji")
     * @Type("string")
     */
    protected $emoji;

    /**
     * Value of the dice, 1-6 for “”, “” and “” base emoji, 1-5 for “” and “” base emoji, 1-64 for “” 
     * base emoji 
     *
     * @var int
     * @SerializedName("value")
     * @Accessor(getter="getValue",setter="setValue")
     * @Type("int")
     */
    protected $value;


    /**
     * @param string $emoji
     * @return static
     */
    public function setEmoji(string $emoji): self
    {
        $this->emoji = $emoji;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @param int $value
     * @return static
     */
    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

}