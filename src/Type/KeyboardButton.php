<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#keyboardbutton
 *
 * This object represents one button of the reply keyboard. For simple text buttons String can be used instead 
 * of this object to specify text of the button. Optional fields are mutually exclusive. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class KeyboardButton extends AbstractType
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
            'request_contact',
            'request_location',
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
            'text' => $this->getText(),
            'request_contact' => $this->getRequestContact(),
            'request_location' => $this->getRequestLocation(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("text")
     * @Accessor(getter="getText",setter="settext")
     * @Type("string")
     */
    protected $text;

    /**
     * Optional. If True, the user&#039;s phone number will be sent as a contact when the button is pressed. Available in private chats only
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_contact")
     * @Accessor(getter="getRequestContact",setter="setrequestContact")
     * @Type("bool")
     */
    protected $requestContact;

    /**
     * Optional. If True, the user&#039;s current location will be sent when the button is pressed. Available in private chats only
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_location")
     * @Accessor(getter="getRequestLocation",setter="setrequestLocation")
     * @Type("bool")
     */
    protected $requestLocation;


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
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param bool $requestContact
     * @return static
     */
    public function setRequestContact(bool $requestContact): self
    {
        $this->requestContact = $requestContact;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestContact(): ?bool
    {
        return $this->requestContact;
    }

    /**
     * @param bool $requestLocation
     * @return static
     */
    public function setRequestLocation(bool $requestLocation): self
    {
        $this->requestLocation = $requestLocation;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestLocation(): ?bool
    {
        return $this->requestLocation;
    }

}