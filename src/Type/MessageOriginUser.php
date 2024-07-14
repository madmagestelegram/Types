<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#messageoriginuser
 *
 * The message was originally sent by a known user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MessageOriginUser extends AbstractMessageOrigin
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
            'sender_user',
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
            'sender_user' => $this->getSenderUser(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the message origin, always “user” 
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
     * User that sent the message originally 
     *
     * @var User
     * @SerializedName("sender_user")
     * @Accessor(getter="getSenderUser", setter="setSenderUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $senderUser;


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
     * @param User $senderUser
     * @return static
     */
    public function setSenderUser(User $senderUser): self
    {
        $this->senderUser = $senderUser;

        return $this;
    }

    /**
     * @return User
     */
    public function getSenderUser(): User
    {
        return $this->senderUser;
    }

}