<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#webappdata
 *
 * Describes data sent from a Web App to the bot. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class WebAppData extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'data',
            'button_text',
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
            'data' => $this->getData(),
            'button_text' => $this->getButtonText(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The data. Be aware that a bad client can send arbitrary data in this field. 
     *
     * @var string
     * @SerializedName("data")
     * @Accessor(getter="getData",setter="setData")
     * @Type("string")
     */
    protected $data;

    /**
     * Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary 
     * data in this field. 
     *
     * @var string
     * @SerializedName("button_text")
     * @Accessor(getter="getButtonText",setter="setButtonText")
     * @Type("string")
     */
    protected $buttonText;


    /**
     * @param string $data
     * @return static
     */
    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $buttonText
     * @return static
     */
    public function setButtonText(string $buttonText): self
    {
        $this->buttonText = $buttonText;

        return $this;
    }

    /**
     * @return string
     */
    public function getButtonText(): string
    {
        return $this->buttonText;
    }

}