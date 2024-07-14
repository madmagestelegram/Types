<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputpaidmediaphoto
 *
 * The paid media to send is a photo. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputPaidMediaPhoto extends AbstractInputPaidMedia
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
            'media',
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
            'media' => $this->getMedia(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the media, must be photo 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * File to send. Pass a file_id to send a file that exists on the Telegram servers (recommended), pass an HTTP URL for 
     * Telegram to get a file from the Internet, or pass “attach://” to upload a new one using 
     * multipart/form-data under  name. More information on Sending Files » 
     *
     * @var string
     * @SerializedName("media")
     * @Accessor(getter="getMedia", setter="setMedia")
     * @Type("string")
     */
    protected $media;


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
     * @param string $media
     * @return static
     */
    public function setMedia(string $media): self
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return string
     */
    public function getMedia(): string
    {
        return $this->media;
    }

}