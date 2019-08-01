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
            'is_closed',
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
            'is_closed' => $this->getIsClosed(),
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
     * @Accessor(getter="getId",setter="setid")
     * @Type("string")
     */
    protected $id;

    /**
     * Poll question, 1-255 characters
     *
     * @var string
     * @SerializedName("question")
     * @Accessor(getter="getQuestion",setter="setquestion")
     * @Type("string")
     */
    protected $question;

    /**
     * List of poll options
     *
     * @var PollOption[]
     * @SerializedName("options")
     * @Accessor(getter="getOptions",setter="setoptions")
     * @Type("array<MadmagesTelegram\Types\Type\PollOption>")
     */
    protected $options;

    /**
     * True, if the poll is closed
     *
     * @var bool
     * @SerializedName("is_closed")
     * @Accessor(getter="getIsClosed",setter="setisClosed")
     * @Type("bool")
     */
    protected $isClosed;


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

}