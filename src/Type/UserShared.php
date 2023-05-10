<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#usershared
 *
 * This object contains information about the user whose identifier was shared with the bot using a KeyboardButtonRequestUser button. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class UserShared extends AbstractType
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
            'user_id',
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
            'user_id' => $this->getUserId(),
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
     * Identifier of the shared user. This number may have more than 32 significant bits and some programming languages may 
     * have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or 
     * double-precision float type are safe for storing this identifier. The bot may not have access to the user and could be unable to use this 
     * identifier, unless the user is already known to the bot by some other means. 
     *
     * @var int
     * @SerializedName("user_id")
     * @Accessor(getter="getUserId", setter="setUserId")
     * @Type("int")
     */
    protected $userId;


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
     * @param int $userId
     * @return static
     */
    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

}