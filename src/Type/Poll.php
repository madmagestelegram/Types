<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#poll
 *
 * This object contains information about a poll. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Poll extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'id',
            'question',
            'options',
            'total_voter_count',
            'is_closed',
            'is_anonymous',
            'type',
            'allows_multiple_answers',
            'correct_option_id',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getRawData(): array
    {
        $result = [
            'id' => $this->getId(),
            'question' => $this->getQuestion(),
            'options' => $this->getOptions(),
            'total_voter_count' => $this->getTotalVoterCount(),
            'is_closed' => $this->getIsClosed(),
            'is_anonymous' => $this->getIsAnonymous(),
            'type' => $this->getType(),
            'allows_multiple_answers' => $this->getAllowsMultipleAnswers(),
            'correct_option_id' => $this->getCorrectOptionId(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Unique poll identifier 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * Poll question, 1-255 characters 
     *
     * @var string
     * @SerializedName("question")
     * @Accessor(getter="getQuestion",setter="setQuestion")
     * @Type("string")
     */
    protected $question;

    /**
     * List of poll options 
     *
     * @var PollOption[]
     * @SerializedName("options")
     * @Accessor(getter="getOptions",setter="setOptions")
     * @Type("array<MadmagesTelegram\Types\Type\PollOption>")
     */
    protected $options;

    /**
     * Total number of users that voted in the poll 
     *
     * @var int
     * @SerializedName("total_voter_count")
     * @Accessor(getter="getTotalVoterCount",setter="setTotalVoterCount")
     * @Type("int")
     */
    protected $totalVoterCount;

    /**
     * True, if the poll is closed 
     *
     * @var bool
     * @SerializedName("is_closed")
     * @Accessor(getter="getIsClosed",setter="setIsClosed")
     * @Type("bool")
     */
    protected $isClosed;

    /**
     * True, if the poll is anonymous 
     *
     * @var bool
     * @SerializedName("is_anonymous")
     * @Accessor(getter="getIsAnonymous",setter="setIsAnonymous")
     * @Type("bool")
     */
    protected $isAnonymous;

    /**
     * Poll type, currently can be “regular” or “quiz” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * True, if the poll allows multiple answers 
     *
     * @var bool
     * @SerializedName("allows_multiple_answers")
     * @Accessor(getter="getAllowsMultipleAnswers",setter="setAllowsMultipleAnswers")
     * @Type("bool")
     */
    protected $allowsMultipleAnswers;

    /**
     * Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are 
     * closed, or was sent (not forwarded) by the bot or to the private chat with the bot. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("correct_option_id")
     * @Accessor(getter="getCorrectOptionId",setter="setCorrectOptionId")
     * @Type("int")
     */
    protected $correctOptionId;


    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $question
     * @return static
     */
    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @param PollOption[] $options
     * @return static
     */
    public function setOptions(array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return PollOption[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param int $totalVoterCount
     * @return static
     */
    public function setTotalVoterCount(int $totalVoterCount): self
    {
        $this->totalVoterCount = $totalVoterCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalVoterCount(): int
    {
        return $this->totalVoterCount;
    }

    /**
     * @param bool $isClosed
     * @return static
     */
    public function setIsClosed(bool $isClosed): self
    {
        $this->isClosed = $isClosed;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsClosed(): bool
    {
        return $this->isClosed;
    }

    /**
     * @param bool $isAnonymous
     * @return static
     */
    public function setIsAnonymous(bool $isAnonymous): self
    {
        $this->isAnonymous = $isAnonymous;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAnonymous(): bool
    {
        return $this->isAnonymous;
    }

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
     * @param bool $allowsMultipleAnswers
     * @return static
     */
    public function setAllowsMultipleAnswers(bool $allowsMultipleAnswers): self
    {
        $this->allowsMultipleAnswers = $allowsMultipleAnswers;

        return $this;
    }

    /**
     * @return bool
     */
    public function getAllowsMultipleAnswers(): bool
    {
        return $this->allowsMultipleAnswers;
    }

    /**
     * @param int $correctOptionId
     * @return static
     */
    public function setCorrectOptionId(int $correctOptionId): self
    {
        $this->correctOptionId = $correctOptionId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCorrectOptionId(): ?int
    {
        return $this->correctOptionId;
    }

}