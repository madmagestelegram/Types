<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#paidmediapreview
 *
 * The paid media isn't available before the payment. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PaidMediaPreview extends AbstractPaidMedia
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
            'width',
            'height',
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
            'type' => $this->getType(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'duration' => $this->getDuration(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the paid media, always “preview” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Optional. Media width as defined by the sender 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("width")
     * @Accessor(getter="getWidth", setter="setWidth")
     * @Type("int")
     */
    protected $width;

    /**
     * Optional. Media height as defined by the sender 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("height")
     * @Accessor(getter="getHeight", setter="setHeight")
     * @Type("int")
     */
    protected $height;

    /**
     * Optional. Duration of the media in seconds as defined by the sender 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("duration")
     * @Accessor(getter="getDuration", setter="setDuration")
     * @Type("int")
     */
    protected $duration;


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
     * @param int $width
     * @return static
     */
    public function setWidth(int $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int $height
     * @return static
     */
    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

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
     * @return int|null
     */
    public function getDuration(): ?int
    {
        return $this->duration;
    }

}