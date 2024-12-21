<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#copytextbutton
 *
 * This object represents an inline keyboard button that copies specified text to the clipboard. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class CopyTextButton extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'text',
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
            'text' => $this->getText(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The text to be copied to the clipboard; 1-256 characters 
     *
     * @var string
     * @SerializedName("text")
     * @Accessor(getter="getText", setter="setText")
     * @Type("string")
     */
    protected $text;


    /**
     * @param string $text
     * @return static
     */
    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

}