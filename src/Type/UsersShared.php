<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#usersshared
 *
 * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class UsersShared extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'request_id',
            'users',
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
            'request_id' => $this->getRequestId(),
            'users' => $this->getUsers(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Identifier of the request 
     *
     * @var int
     * @SerializedName("request_id")
     * @Accessor(getter="getRequestId", setter="setRequestId")
     * @Type("int")
     */
    protected $requestId;

    /**
     * Information about users shared with the bot. 
     *
     * @var SharedUser[]
     * @SerializedName("users")
     * @Accessor(getter="getUsers", setter="setUsers")
     * @Type("array<MadmagesTelegram\Types\Type\SharedUser>")
     */
    protected $users;


    /**
     * @param int $requestId
     * @return static
     */
    public function setRequestId(int $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @param SharedUser[] $users
     * @return static
     */
    public function setUsers(array $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return SharedUser[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

}