<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#replykeyboardmarkup
 *
 * This object represents a custom keyboard with reply 
 * options (see Introduction to bots for details and examples). 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ReplyKeyboardMarkup extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'keyboard',
            'resize_keyboard',
            'one_time_keyboard',
            'selective',
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
            'keyboard' => $this->getKeyboard(),
            'resize_keyboard' => $this->getResizeKeyboard(),
            'one_time_keyboard' => $this->getOneTimeKeyboard(),
            'selective' => $this->getSelective(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Array of button rows, each represented by an Array of KeyboardButton objects 
     *
     * @var array[]
     * @SerializedName("keyboard")
     * @Accessor(getter="getKeyboard",setter="setKeyboard")
     * @Type("array<array>")
     */
    protected $keyboard;

    /**
     * Optional. Requests clients to resize the keyboard vertically for optimal fit (e.g., make the keyboard smaller if 
     * there are just two rows of buttons). Defaults to false, in which case the custom keyboard is always of the same height as the 
     * app's standard keyboard. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("resize_keyboard")
     * @Accessor(getter="getResizeKeyboard",setter="setResizeKeyboard")
     * @Type("bool")
     */
    protected $resizeKeyboard;

    /**
     * Optional. Requests clients to hide the keyboard as soon as it's been used. The keyboard will still be available, but 
     * clients will automatically display the usual letter-keyboard in the chat – the user can press a special button in the input 
     * field to see the custom keyboard again. Defaults to false. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("one_time_keyboard")
     * @Accessor(getter="getOneTimeKeyboard",setter="setOneTimeKeyboard")
     * @Type("bool")
     */
    protected $oneTimeKeyboard;

    /**
     * Optional. Use this parameter if you want to show the keyboard to specific users only. Targets: 1) users that are 
     * @|mentioned in the text of the Message object; 2) if the bot's message is a reply (has reply_to_message_id), sender of the 
     * original message.Example: A user requests to change the bot‘s language, bot replies to the request with a keyboard to 
     * select the new language. Other users in the group don’t see the keyboard. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("selective")
     * @Accessor(getter="getSelective",setter="setSelective")
     * @Type("bool")
     */
    protected $selective;


    /**
     * @param array[] $keyboard
     * @return static
     */
    public function setKeyboard(array $keyboard): self
    {
        $this->keyboard = $keyboard;

        return $this;
    }

    /**
     * @return array[]
     */
    public function getKeyboard(): array
    {
        return $this->keyboard;
    }

    /**
     * @param bool $resizeKeyboard
     * @return static
     */
    public function setResizeKeyboard(bool $resizeKeyboard): self
    {
        $this->resizeKeyboard = $resizeKeyboard;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getResizeKeyboard(): ?bool
    {
        return $this->resizeKeyboard;
    }

    /**
     * @param bool $oneTimeKeyboard
     * @return static
     */
    public function setOneTimeKeyboard(bool $oneTimeKeyboard): self
    {
        $this->oneTimeKeyboard = $oneTimeKeyboard;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getOneTimeKeyboard(): ?bool
    {
        return $this->oneTimeKeyboard;
    }

    /**
     * @param bool $selective
     * @return static
     */
    public function setSelective(bool $selective): self
    {
        $this->selective = $selective;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

}