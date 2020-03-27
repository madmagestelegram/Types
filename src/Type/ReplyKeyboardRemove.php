<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#replykeyboardremove
 *
 * Upon receiving a message with this object, Telegram clients will remove the current custom keyboard and display the 
 * default letter-keyboard. By default, custom keyboards are displayed until a new keyboard is sent by a bot. An exception is 
 * made for one-time keyboards that are hidden immediately after the user presses a button (see ReplyKeyboardMarkup). 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ReplyKeyboardRemove extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'remove_keyboard',
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
            'remove_keyboard' => $this->getRemoveKeyboard(),
            'selective' => $this->getSelective(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Requests clients to remove the custom keyboard (user will not be able to summon this keyboard; if you want to hide the keyboard from sight but keep it accessible, use one_time_keyboard in ReplyKeyboardMarkup)
     *
     * @var bool
     * @SerializedName("remove_keyboard")
     * @Accessor(getter="getRemoveKeyboard",setter="setRemoveKeyboard")
     * @Type("bool")
     */
    protected $removeKeyboard;

    /**
     * Optional. Use this parameter if you want to remove the keyboard for specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot&#039;s message is a reply (has reply_to_message_id), sender of the original message.Example: A user votes in a poll, bot returns confirmation message in reply to the vote and removes the keyboard for that user, while still showing the keyboard with poll options to users who haven&#039;t voted yet.
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("selective")
     * @Accessor(getter="getSelective",setter="setSelective")
     * @Type("bool")
     */
    protected $selective;


    /**
     * @param bool $removeKeyboard
     * @return static
     */
    public function setRemoveKeyboard(bool $removeKeyboard): self
    {
        $this->removeKeyboard = $removeKeyboard;

        return $this;
    }

    /**
     * @return bool
     */
    public function getRemoveKeyboard(): bool
    {
        return $this->removeKeyboard;
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