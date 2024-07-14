<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#polloption
 *
 * This object contains information about one answer option in a poll. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PollOption extends AbstractType
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
            'text_entities',
            'voter_count',
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
            'text_entities' => $this->getTextEntities(),
            'voter_count' => $this->getVoterCount(),
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
     * Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in 
     * poll option texts 
     *
     * @var MessageEntity[]|null
     * @SkipWhenEmpty
     * @SerializedName("text_entities")
     * @Accessor(getter="getTextEntities", setter="setTextEntities")
     * @Type("array<MadmagesTelegram\Types\Type\MessageEntity>")
     */
    protected $textEntities;

    /**
     * Number of users that voted for this option 
     *
     * @var int
     * @SerializedName("voter_count")
     * @Accessor(getter="getVoterCount", setter="setVoterCount")
     * @Type("int")
     */
    protected $voterCount;


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
     * @param int $voterCount
     * @return static
     */
    public function setVoterCount(int $voterCount): self
    {
        $this->voterCount = $voterCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getVoterCount(): int
    {
        return $this->voterCount;
    }

}