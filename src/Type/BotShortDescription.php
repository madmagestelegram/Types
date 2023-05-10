<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#botshortdescription
 *
 * This object represents the bot's short description. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BotShortDescription extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'short_description',
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
            'short_description' => $this->getShortDescription(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The bot's short description 
     *
     * @var string
     * @SerializedName("short_description")
     * @Accessor(getter="getShortDescription", setter="setShortDescription")
     * @Type("string")
     */
    protected $shortDescription;


    /**
     * @param string $shortDescription
     * @return static
     */
    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

}