<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatmemberbanned
 *
 * Represents a chat member that was banned in the chat and can't return to the chat or view 
 * chat messages. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatMemberBanned extends AbstractChatMember
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'status',
            'user',
            'until_date',
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
            'status' => $this->getStatus(),
            'user' => $this->getUser(),
            'until_date' => $this->getUntilDate(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The member's status in the chat, always “kicked” 
     *
     * @var string
     * @SerializedName("status")
     * @Accessor(getter="getStatus",setter="setStatus")
     * @Type("string")
     */
    protected $status;

    /**
     * Information about the user 
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser",setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * Date when restrictions will be lifted for this user; unix time. If 0, then the user is banned forever 
     *
     * @var int
     * @SerializedName("until_date")
     * @Accessor(getter="getUntilDate",setter="setUntilDate")
     * @Type("int")
     */
    protected $untilDate;


    /**
     * @param string $status
     * @return static
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param User $user
     * @return static
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param int $untilDate
     * @return static
     */
    public function setUntilDate(int $untilDate): self
    {
        $this->untilDate = $untilDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getUntilDate(): int
    {
        return $this->untilDate;
    }

}