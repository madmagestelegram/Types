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
            'voter_count',
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
            'text' => $this->getText(),
            'voter_count' => $this->getVoterCount(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Option text, 1-100 characters 
     *
     * @var string
     * @SerializedName("text")
     * @Accessor(getter="getText",setter="setText")
     * @Type("string")
     */
    protected $text;

    /**
     * Number of users that voted for this option 
     *
     * @var int
     * @SerializedName("voter_count")
     * @Accessor(getter="getVoterCount",setter="setVoterCount")
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