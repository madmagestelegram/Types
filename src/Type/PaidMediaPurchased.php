<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#paidmediapurchased
 *
 * This object contains information about a paid media purchase. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PaidMediaPurchased extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'from',
            'paid_media_payload',
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
            'from' => $this->getFrom(),
            'paid_media_payload' => $this->getPaidMediaPayload(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * User who purchased the media 
     *
     * @var User
     * @SerializedName("from")
     * @Accessor(getter="getFrom", setter="setFrom")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $from;

    /**
     * Bot-specified paid media payload 
     *
     * @var string
     * @SerializedName("paid_media_payload")
     * @Accessor(getter="getPaidMediaPayload", setter="setPaidMediaPayload")
     * @Type("string")
     */
    protected $paidMediaPayload;


    /**
     * @param User $from
     * @return static
     */
    public function setFrom(User $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return User
     */
    public function getFrom(): User
    {
        return $this->from;
    }

    /**
     * @param string $paidMediaPayload
     * @return static
     */
    public function setPaidMediaPayload(string $paidMediaPayload): self
    {
        $this->paidMediaPayload = $paidMediaPayload;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaidMediaPayload(): string
    {
        return $this->paidMediaPayload;
    }

}