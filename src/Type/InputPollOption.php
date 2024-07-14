<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputpolloption
 *
 * This object contains information about one answer option in a poll to be sent. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputPollOption extends AbstractType
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
            'text_parse_mode',
            'text_entities',
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
            'text_parse_mode' => $this->getTextParseMode(),
            'text_entities' => $this->getTextEntities(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Option text, 1-100 characters 
     *
     * @var string
     * @SerializedName("text")
     * @Accessor(getter="getText", setter="setText")
     * @Type("string")
     */
    protected $text;

    /**
     * Optional. Mode for parsing entities in the text. See formatting options for more details. Currently, only custom 
     * emoji entities are allowed 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("text_parse_mode")
     * @Accessor(getter="getTextParseMode", setter="setTextParseMode")
     * @Type("string")
     */
    protected $textParseMode;

    /**
     * Optional. A JSON-serialized list of special entities that appear in the poll option text. It can be specified 
     * instead of text_parse_mode 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("text_entities")
     * @Accessor(getter="getTextEntities", setter="setTextEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $textEntities;


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
     * @param string $textParseMode
     * @return static
     */
    public function setTextParseMode(string $textParseMode): self
    {
        $this->textParseMode = $textParseMode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTextParseMode(): ?string
    {
        return $this->textParseMode;
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

}