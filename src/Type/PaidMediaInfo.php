<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#paidmediainfo
 *
 * Describes the paid media added to a message. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PaidMediaInfo extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'star_count',
            'paid_media',
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
            'star_count' => $this->getStarCount(),
            'paid_media' => $this->getPaidMedia(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The number of Telegram Stars that must be paid to buy access to the media 
     *
     * @var int
     * @SerializedName("star_count")
     * @Accessor(getter="getStarCount", setter="setStarCount")
     * @Type("int")
     */
    protected $starCount;

    /**
     * Information about the paid media 
     *
     * @var AbstractPaidMedia[]
     * @SerializedName("paid_media")
     * @Accessor(getter="getPaidMedia", setter="setPaidMedia")
     * @Type("array<MadmagesTelegram\Types\Type\AbstractPaidMedia>")
     */
    protected $paidMedia;


    /**
     * @param int $starCount
     * @return static
     */
    public function setStarCount(int $starCount): self
    {
        $this->starCount = $starCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getStarCount(): int
    {
        return $this->starCount;
    }

    /**
     * @param AbstractPaidMedia[] $paidMedia
     * @return static
     */
    public function setPaidMedia(array $paidMedia): self
    {
        $this->paidMedia = $paidMedia;

        return $this;
    }

    /**
     * @return AbstractPaidMedia[]
     */
    public function getPaidMedia(): array
    {
        return $this->paidMedia;
    }

}