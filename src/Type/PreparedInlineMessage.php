<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#preparedinlinemessage
 *
 * Describes an inline message to be sent by a user of a Mini App. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PreparedInlineMessage extends AbstractType
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
            'expiration_date',
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
            'expiration_date' => $this->getExpirationDate(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier of the prepared message 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId", setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * Expiration date of the prepared message, in Unix time. Expired prepared messages can no longer be used 
     *
     * @var int
     * @SerializedName("expiration_date")
     * @Accessor(getter="getExpirationDate", setter="setExpirationDate")
     * @Type("int")
     */
    protected $expirationDate;


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
     * @param int $expirationDate
     * @return static
     */
    public function setExpirationDate(int $expirationDate): self
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getExpirationDate(): int
    {
        return $this->expirationDate;
    }

}