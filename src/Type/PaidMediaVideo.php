<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#paidmediavideo
 *
 * The paid media is a video. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PaidMediaVideo extends AbstractPaidMedia
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
            'video',
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
            'video' => $this->getVideo(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the paid media, always “video” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * The video 
     *
     * @var Video
     * @SerializedName("video")
     * @Accessor(getter="getVideo", setter="setVideo")
     * @Type("MadmagesTelegram\Types\Type\Video")
     */
    protected $video;


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
     * @param Video $video
     * @return static
     */
    public function setVideo(Video $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Video
     */
    public function getVideo(): Video
    {
        return $this->video;
    }

}