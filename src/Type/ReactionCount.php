<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#reactioncount
 *
 * Represents a reaction added to a message along with the number of times it was added. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ReactionCount extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'type',
            'total_count',
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
            'type' => $this->getType(),
            'total_count' => $this->getTotalCount(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the reaction 
     *
     * @var AbstractReactionType
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("MadmagesTelegram\Types\Type\AbstractReactionType")
     */
    protected $type;

    /**
     * Number of times the reaction was added 
     *
     * @var int
     * @SerializedName("total_count")
     * @Accessor(getter="getTotalCount", setter="setTotalCount")
     * @Type("int")
     */
    protected $totalCount;


    /**
     * @param AbstractReactionType $type
     * @return static
     */
    public function setType(AbstractReactionType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return AbstractReactionType
     */
    public function getType(): AbstractReactionType
    {
        return $this->type;
    }

    /**
     * @param int $totalCount
     * @return static
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

}