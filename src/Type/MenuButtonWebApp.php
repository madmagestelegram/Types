<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#menubuttonwebapp
 *
 * Represents a menu button, which launches a Web App. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MenuButtonWebApp extends AbstractType
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
            'text',
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
            'type' => $this->getType(),
            'text' => $this->getText(),
            'web_app' => $this->getWebApp(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the button, must be web_app 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Text on the button 
     *
     * @var string
     * @SerializedName("text")
     * @Accessor(getter="getText", setter="setText")
     * @Type("string")
     */
    protected $text;

    /**
     * Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an 
     * arbitrary message on behalf of the user using the method answerWebAppQuery. 
     *
     * @var WebAppInfo
     * @SerializedName("web_app")
     * @Accessor(getter="getWebApp", setter="setWebApp")
     * @Type("MadmagesTelegram\Types\Type\WebAppInfo")
     */
    protected $webApp;


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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

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
     * @return WebAppInfo
     */
    public function getWebApp(): WebAppInfo
    {
        return $this->webApp;
    }

}