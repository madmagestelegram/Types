<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#loginurl
 *
 * This object represents a parameter of the inline keyboard button used to automatically authorize a user. Serves as a 
 * great replacement for the Telegram Login Widget when the 
 * user is coming from Telegram. All the user needs to do is tap/click a button and confirm that they want to log in: 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class LoginUrl extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'url',
            'forward_text',
            'bot_username',
            'request_write_access',
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
            'url' => $this->getUrl(),
            'forward_text' => $this->getForwardText(),
            'bot_username' => $this->getBotUsername(),
            'request_write_access' => $this->getRequestWriteAccess(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * An HTTP URL to be opened with user authorization data added to the query string when the button is pressed. If the user refuses to provide authorization data, the original URL without information about the user will be opened. The data added is the same as described in Receiving authorization data.NOTE: You must always check the hash of the received data to verify the authentication and the integrity of the data as described in Checking authorization.
     *
     * @var string
     * @SerializedName("url")
     * @Accessor(getter="getUrl",setter="seturl")
     * @Type("string")
     */
    protected $url;

    /**
     * Optional. New text of the button in forwarded messages.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("forward_text")
     * @Accessor(getter="getForwardText",setter="setforwardText")
     * @Type("string")
     */
    protected $forwardText;

    /**
     * Optional. Username of a bot, which will be used for user authorization. See Setting up a bot for more details. If not specified, the current bot&#039;s username will be assumed. The url&#039;s domain must be the same as the domain linked with the bot. See Linking your domain to the bot for more details.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("bot_username")
     * @Accessor(getter="getBotUsername",setter="setbotUsername")
     * @Type("string")
     */
    protected $botUsername;

    /**
     * Optional. Pass True to request the permission for your bot to send messages to the user.
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_write_access")
     * @Accessor(getter="getRequestWriteAccess",setter="setrequestWriteAccess")
     * @Type("bool")
     */
    protected $requestWriteAccess;


    /**
     * @param string $url
     * @return static
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $forwardText
     * @return static
     */
    public function setForwardText(string $forwardText): self
    {
        $this->forwardText = $forwardText;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getForwardText(): ?string
    {
        return $this->forwardText;
    }

    /**
     * @param string $botUsername
     * @return static
     */
    public function setBotUsername(string $botUsername): self
    {
        $this->botUsername = $botUsername;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBotUsername(): ?string
    {
        return $this->botUsername;
    }

    /**
     * @param bool $requestWriteAccess
     * @return static
     */
    public function setRequestWriteAccess(bool $requestWriteAccess): self
    {
        $this->requestWriteAccess = $requestWriteAccess;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestWriteAccess(): ?bool
    {
        return $this->requestWriteAccess;
    }

}