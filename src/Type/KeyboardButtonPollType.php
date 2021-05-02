<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#keyboardbuttonpolltype
 *
 * This object represents type of a poll, which is allowed to be created and sent when the corresponding button is 
 * pressed. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class KeyboardButtonPollType extends AbstractType
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
     * Optional. If quiz is passed, the user will be allowed to create only polls in the quiz mode. If regular is passed, only 
     * regular polls will be allowed. Otherwise, the user will be allowed to create a poll of any type. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="setType")
     * @Type("string")
     */
    protected $type;


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
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

}