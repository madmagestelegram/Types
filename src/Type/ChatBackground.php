<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatbackground
 *
 * This object represents a chat background. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatBackground extends AbstractType
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
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the background 
     *
     * @var AbstractBackgroundType
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("MadmagesTelegram\Types\Type\AbstractBackgroundType")
     */
    protected $type;


    /**
     * @param AbstractBackgroundType $type
     * @return static
     */
    public function setType(AbstractBackgroundType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return AbstractBackgroundType
     */
    public function getType(): AbstractBackgroundType
    {
        return $this->type;
    }

}