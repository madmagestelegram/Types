<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inlinequeryresultsbutton
 *
 * This object represents a button to be shown above inline query results. You must use exactly one of 
 * the optional fields. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InlineQueryResultsButton extends AbstractInlineQueryResult
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
            'web_app',
            'start_parameter',
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
            'web_app' => $this->getWebApp(),
            'start_parameter' => $this->getStartParameter(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Label text on the button 
     *
     * @var string
     * @SerializedName("text")
     * @Accessor(getter="getText", setter="setText")
     * @Type("string")
     */
    protected $text;

    /**
     * Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to 
     * switch back to the inline mode using the method switchInlineQuery inside the Web App. 
     *
     * @var WebAppInfo|null
     * @SkipWhenEmpty
     * @SerializedName("web_app")
     * @Accessor(getter="getWebApp", setter="setWebApp")
     * @Type("MadmagesTelegram\Types\Type\WebAppInfo")
     */
    protected $webApp;

    /**
     * Optional. Deep-linking parameter for the /start message sent to the bot when a user presses the button. 1-64 
     * characters, only A-Z, a-z, 0-9, _ and - are allowed.Example: An inline bot that sends YouTube videos can ask the user to connect the 
     * bot to their YouTube account to adapt search results accordingly. To do this, it displays a 'Connect your YouTube 
     * account' button above the results, or even before showing any. The user presses the button, switches to a private chat with the 
     * bot and, in doing so, passes a start parameter that instructs the bot to return an OAuth link. Once done, the bot can offer a 
     * switch_inline button so that the user can easily return to the chat where they wanted to use the bot's inline capabilities. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("start_parameter")
     * @Accessor(getter="getStartParameter", setter="setStartParameter")
     * @Type("string")
     */
    protected $startParameter;


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

    /**
     * @param string $startParameter
     * @return static
     */
    public function setStartParameter(string $startParameter): self
    {
        $this->startParameter = $startParameter;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStartParameter(): ?string
    {
        return $this->startParameter;
    }

}