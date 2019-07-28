<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#responseparameters
 *
 * Contains information about why a request was unsuccessful. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ResponseParameters extends AbstractType
{
    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("migrate_to_chat_id")
     * @Accessor(getter="getMigrateToChatId",setter="setmigrateToChatId")
     * @Type("int")
     */
    protected $migrateToChatId;

    /**
     * Optional. In case of exceeding flood control, the number of seconds left to wait before the request can be repeated
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("retry_after")
     * @Accessor(getter="getRetryAfter",setter="setretryAfter")
     * @Type("int")
     */
    protected $retryAfter;


    /**
     * @param int $migrateToChatId
     * @return static
     */
    public function setMigrateToChatId(int $migrateToChatId): self
    {
        $this->migrateToChatId = $migrateToChatId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMigrateToChatId(): ?int
    {
        return $this->migrateToChatId;
    }

    /**
     * @param int $retryAfter
     * @return static
     */
    public function setRetryAfter(int $retryAfter): self
    {
        $this->retryAfter = $retryAfter;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }

}