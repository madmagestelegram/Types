<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#messageoriginhiddenuser
 *
 * The message was originally sent by an unknown user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MessageOriginHiddenUser extends AbstractMessageOrigin
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
            'date',
            'sender_user_name',
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
            'date' => $this->getDate(),
            'sender_user_name' => $this->getSenderUserName(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the message origin, always “hidden_user” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Date the message was sent originally in Unix time 
     *
     * @var int
     * @SerializedName("date")
     * @Accessor(getter="getDate", setter="setDate")
     * @Type("int")
     */
    protected $date;

    /**
     * Name of the user that sent the message originally 
     *
     * @var string
     * @SerializedName("sender_user_name")
     * @Accessor(getter="getSenderUserName", setter="setSenderUserName")
     * @Type("string")
     */
    protected $senderUserName;


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
     * @param int $date
     * @return static
     */
    public function setDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getDate(): int
    {
        return $this->date;
    }

    /**
     * @param string $senderUserName
     * @return static
     */
    public function setSenderUserName(string $senderUserName): self
    {
        $this->senderUserName = $senderUserName;

        return $this;
    }

    /**
     * @return string
     */
    public function getSenderUserName(): string
    {
        return $this->senderUserName;
    }

}