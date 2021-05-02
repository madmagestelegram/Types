<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#voicechatscheduled
 *
 * This object represents a service message about a voice chat scheduled in the chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class VoiceChatScheduled extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'start_date',
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
            'start_date' => $this->getStartDate(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Point in time (Unix timestamp) when the voice chat is supposed to be started by a chat administrator 
     *
     * @var int
     * @SerializedName("start_date")
     * @Accessor(getter="getStartDate",setter="setStartDate")
     * @Type("int")
     */
    protected $startDate;


    /**
     * @param int $startDate
     * @return static
     */
    public function setStartDate(int $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getStartDate(): int
    {
        return $this->startDate;
    }

}