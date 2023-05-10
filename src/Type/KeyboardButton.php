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
 * This object represents one button of the reply keyboard. For simple text buttons, String can be used 
 * instead of this object to specify the button text. The optional fields web_app, request_user, 
 * request_chat, request_contact, request_location, and request_poll are mutually exclusive. 
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
            'request_user',
            'request_chat',
            'request_contact',
            'request_location',
            'request_poll',
            'web_app',
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
            'request_user' => $this->getRequestUser(),
            'request_chat' => $this->getRequestChat(),
            'request_contact' => $this->getRequestContact(),
            'request_location' => $this->getRequestLocation(),
            'request_poll' => $this->getRequestPoll(),
            'web_app' => $this->getWebApp(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("text")
     * @Accessor(getter="getText", setter="setText")
     * @Type("string")
     */
    protected $text;

    /**
     * Optional. If specified, pressing the button will open a list of suitable users. Tapping on any user will send their 
     * identifier to the bot in a “user_shared” service message. Available in private chats only. 
     *
     * @var KeyboardButtonRequestUser|null
     * @SkipWhenEmpty
     * @SerializedName("request_user")
     * @Accessor(getter="getRequestUser", setter="setRequestUser")
     * @Type("MadmagesTelegram\Types\Type\KeyboardButtonRequestUser")
     */
    protected $requestUser;

    /**
     * Optional. If specified, pressing the button will open a list of suitable chats. Tapping on a chat will send its 
     * identifier to the bot in a “chat_shared” service message. Available in private chats only. 
     *
     * @var KeyboardButtonRequestChat|null
     * @SkipWhenEmpty
     * @SerializedName("request_chat")
     * @Accessor(getter="getRequestChat", setter="setRequestChat")
     * @Type("MadmagesTelegram\Types\Type\KeyboardButtonRequestChat")
     */
    protected $requestChat;

    /**
     * Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private 
     * chats only. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_contact")
     * @Accessor(getter="getRequestContact", setter="setRequestContact")
     * @Type("bool")
     */
    protected $requestContact;

    /**
     * Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats 
     * only. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_location")
     * @Accessor(getter="getRequestLocation", setter="setRequestLocation")
     * @Type("bool")
     */
    protected $requestLocation;

    /**
     * Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. 
     * Available in private chats only. 
     *
     * @var KeyboardButtonPollType|null
     * @SkipWhenEmpty
     * @SerializedName("request_poll")
     * @Accessor(getter="getRequestPoll", setter="setRequestPoll")
     * @Type("MadmagesTelegram\Types\Type\KeyboardButtonPollType")
     */
    protected $requestPoll;

    /**
     * Optional. If specified, the described Web App will be launched when the button is pressed. The Web App will be able to 
     * send a “web_app_data” service message. Available in private chats only. 
     *
     * @var WebAppInfo|null
     * @SkipWhenEmpty
     * @SerializedName("web_app")
     * @Accessor(getter="getWebApp", setter="setWebApp")
     * @Type("MadmagesTelegram\Types\Type\WebAppInfo")
     */
    protected $webApp;


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
     * @param KeyboardButtonRequestUser $requestUser
     * @return static
     */
    public function setRequestUser(KeyboardButtonRequestUser $requestUser): self
    {
        $this->requestUser = $requestUser;

        return $this;
    }

    /**
     * @return KeyboardButtonRequestUser|null
     */
    public function getRequestUser(): ?KeyboardButtonRequestUser
    {
        return $this->requestUser;
    }

    /**
     * @param KeyboardButtonRequestChat $requestChat
     * @return static
     */
    public function setRequestChat(KeyboardButtonRequestChat $requestChat): self
    {
        $this->requestChat = $requestChat;

        return $this;
    }

    /**
     * @return KeyboardButtonRequestChat|null
     */
    public function getRequestChat(): ?KeyboardButtonRequestChat
    {
        return $this->requestChat;
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

    /**
     * @param KeyboardButtonPollType $requestPoll
     * @return static
     */
    public function setRequestPoll(KeyboardButtonPollType $requestPoll): self
    {
        $this->requestPoll = $requestPoll;

        return $this;
    }

    /**
     * @return KeyboardButtonPollType|null
     */
    public function getRequestPoll(): ?KeyboardButtonPollType
    {
        return $this->requestPoll;
    }

    /**
     * @param WebAppInfo $webApp
     * @return static
     */
    public function setWebApp(WebAppInfo $webApp): self
    {
        $this->webApp = $webApp;

        return $this;
    }

    /**
     * @return WebAppInfo|null
     */
    public function getWebApp(): ?WebAppInfo
    {
        return $this->webApp;
    }

}