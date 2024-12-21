<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#gifts
 *
 * This object represent a list of gifts. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Gifts extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'gifts',
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
            'gifts' => $this->getGifts(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The list of gifts 
     *
     * @var Gift[]
     * @SerializedName("gifts")
     * @Accessor(getter="getGifts", setter="setGifts")
     * @Type("array<MadmagesTelegram\Types\Type\Gift>")
     */
    protected $gifts;


    /**
     * @param Gift[] $gifts
     * @return static
     */
    public function setGifts(array $gifts): self
    {
        $this->gifts = $gifts;

        return $this;
    }

    /**
     * @return Gift[]
     */
    public function getGifts(): array
    {
        return $this->gifts;
    }

}