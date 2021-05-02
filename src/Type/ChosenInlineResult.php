<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#choseninlineresult
 *
 * Represents a result of an inline query that was chosen by the user and sent to 
 * their chat partner. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChosenInlineResult extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'result_id',
            'from',
            'location',
            'inline_message_id',
            'query',
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
            'result_id' => $this->getResultId(),
            'from' => $this->getFrom(),
            'location' => $this->getLocation(),
            'inline_message_id' => $this->getInlineMessageId(),
            'query' => $this->getQuery(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The unique identifier for the result that was chosen 
     *
     * @var string
     * @SerializedName("result_id")
     * @Accessor(getter="getResultId",setter="setResultId")
     * @Type("string")
     */
    protected $resultId;

    /**
     * The user that chose the result 
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom",setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Optional. Sender location, only for bots that require user location 
     *
     * @var Location|null
     * @SkipWhenEmpty
     * @SerializedName("location")
     * @Accessor(getter="getLocation",setter="setLocation")
     * @Type("MadmagesTelegram\Types\Type\Location")
     */
    protected $location;

    /**
     * Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the 
     * message. Will be also received in callback queries and can be used to edit the message. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("inline_message_id")
     * @Accessor(getter="getInlineMessageId",setter="setInlineMessageId")
     * @Type("string")
     */
    protected $inlineMessageId;

    /**
     * The query that was used to obtain the result 
     *
     * @var string
     * @SerializedName("query")
     * @Accessor(getter="getQuery",setter="setQuery")
     * @Type("string")
     */
    protected $query;


    /**
     * @param string $resultId
     * @return static
     */
    public function setResultId(string $resultId): self
    {
        $this->resultId = $resultId;

        return $this;
    }

    /**
     * @return string
     */
    public function getResultId(): string
    {
        return $this->resultId;
    }

    /**
     * @param User $from
     * @return static
     */
    public function setFrom(User $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param Location $location
     * @return static
     */
    public function setLocation(Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param string $inlineMessageId
     * @return static
     */
    public function setInlineMessageId(string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

    /**
     * @param string $query
     * @return static
     */
    public function setQuery(string $query): self
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

}