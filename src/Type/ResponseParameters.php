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
 * Describes why a request was unsuccessful. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ResponseParameters extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'migrate_to_chat_id',
            'retry_after',
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
            'migrate_to_chat_id' => $this->getMigrateToChatId(),
            'retry_after' => $this->getRetryAfter(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 
     * 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has 
     * at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this 
     * identifier. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("migrate_to_chat_id")
     * @Accessor(getter="getMigrateToChatId", setter="setMigrateToChatId")
     * @Type("int")
     */
    protected $migrateToChatId;

    /**
     * Optional. In case of exceeding flood control, the number of seconds left to wait before the request can be repeated 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("retry_after")
     * @Accessor(getter="getRetryAfter", setter="setRetryAfter")
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