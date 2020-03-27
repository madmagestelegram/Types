<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinekeyboardmarkup
 *
 * This object represents an inline keyboard that appears right next to the message it belongs to. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineKeyboardMarkup extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'inline_keyboard',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getRawData(): array
    {
        $result = [
            'inline_keyboard' => $this->getInlineKeyboard(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Array of button rows, each represented by an Array of InlineKeyboardButton objects 
     *
     * @var array[]
     * @SerializedName("inline_keyboard")
     * @Accessor(getter="getInlineKeyboard",setter="setInlineKeyboard")
     * @Type("array<array>")
     */
    protected $inlineKeyboard;


    /**
     * @param array[] $inlineKeyboard
     * @return static
     */
    public function setInlineKeyboard(array $inlineKeyboard): self
    {
        $this->inlineKeyboard = $inlineKeyboard;

        return $this;
    }

    /**
     * @return array[]
     */
    public function getInlineKeyboard(): array
    {
        return $this->inlineKeyboard;
    }

}