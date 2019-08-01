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
            'location',
            'query',
            'offset',
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
            'from' => $this->getFrom(),
            'location' => $this->getLocation(),
            'query' => $this->getQuery(),
            'offset' => $this->getOffset(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Unique identifier for this query
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setid")
     * @Type("string")
     */
    protected $id;

    /**
     * Sender
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom",setter="setfrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Optional. Sender location, only for bots that request user location
     *
     * @var Location|null
     * @SkipWhenEmpty
     * @SerializedName("location")
     * @Accessor(getter="getLocation",setter="setlocation")
     * @Type("MadmagesTelegram\Types\Type\Location")
     */
    protected $location;

    /**
     * Text of the query (up to 512 characters)
     *
     * @var string
     * @SerializedName("query")
     * @Accessor(getter="getQuery",setter="setquery")
     * @Type("string")
     */
    protected $query;

    /**
     * Offset of the results to be returned, can be controlled by the bot
     *
     * @var string
     * @SerializedName("offset")
     * @Accessor(getter="getOffset",setter="setoffset")
     * @Type("string")
     */
    protected $offset;


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

}