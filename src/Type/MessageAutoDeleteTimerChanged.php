<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#messageautodeletetimerchanged
 *
 * This object represents a service message about a change in auto-delete timer settings. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MessageAutoDeleteTimerChanged extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'message_auto_delete_time',
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
            'message_auto_delete_time' => $this->getMessageAutoDeleteTime(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * New auto-delete time for messages in the chat; in seconds 
     *
     * @var int
     * @SerializedName("message_auto_delete_time")
     * @Accessor(getter="getMessageAutoDeleteTime", setter="setMessageAutoDeleteTime")
     * @Type("int")
     */
    protected $messageAutoDeleteTime;


    /**
     * @param int $messageAutoDeleteTime
     * @return static
     */
    public function setMessageAutoDeleteTime(int $messageAutoDeleteTime): self
    {
        $this->messageAutoDeleteTime = $messageAutoDeleteTime;

        return $this;
    }

    /**
     * @return int
     */
    public function getMessageAutoDeleteTime(): int
    {
        return $this->messageAutoDeleteTime;
    }

}