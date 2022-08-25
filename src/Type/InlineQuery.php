<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequery
 *
 * This object represents an incoming inline query. When the user sends an empty query, your bot could return some 
 * default or trending results. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQuery extends AbstractType
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
            'from',
            'query',
            'offset',
            'chat_type',
            'location',
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
            'id' => $this->getId(),
            'from' => $this->getFrom(),
            'query' => $this->getQuery(),
            'offset' => $this->getOffset(),
            'chat_type' => $this->getChatType(),
            'location' => $this->getLocation(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier for this query 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * Sender 
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom",setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Text of the query (up to 256 characters) 
     *
     * @var string
     * @SerializedName("query")
     * @Accessor(getter="getQuery",setter="setQuery")
     * @Type("string")
     */
    protected $query;

    /**
     * Offset of the results to be returned, can be controlled by the bot 
     *
     * @var string
     * @SerializedName("offset")
     * @Accessor(getter="getOffset",setter="setOffset")
     * @Type("string")
     */
    protected $offset;

    /**
     * Optional. Type of the chat from which the inline query was sent. Can be either “sender” for a private chat with the 
     * inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always 
     * known for requests sent from official clients and most third-party clients, unless the request was sent from a secret chat 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("chat_type")
     * @Accessor(getter="getChatType",setter="setChatType")
     * @Type("string")
     */
    protected $chatType;

    /**
     * Optional. Sender location, only for bots that request user location 
     *
     * @var Location|null
     * @SkipWhenEmpty
     * @SerializedName("location")
     * @Accessor(getter="getLocation",setter="setLocation")
     * @Type("MadmagesTelegram\Types\Type\Location")
     */
    protected $location;


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

    /**
     * @param string $offset
     * @return static
     */
    public function setOffset(string $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @return string
     */
    public function getOffset(): string
    {
        return $this->offset;
    }

    /**
     * @param string $chatType
     * @return static
     */
    public function setChatType(string $chatType): self
    {
        $this->chatType = $chatType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getChatType(): ?string
    {
        return $this->chatType;
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

}