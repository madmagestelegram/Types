<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#videochatended
 *
 * This object represents a service message about a video chat ended in the chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class VideoChatEnded extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'duration',
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
            'duration' => $this->getDuration(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Video chat duration in seconds 
     *
     * @var int
     * @SerializedName("duration")
     * @Accessor(getter="getDuration", setter="setDuration")
     * @Type("int")
     */
    protected $duration;


    /**
     * @param int $duration
     * @return static
     */
    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

}