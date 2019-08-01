<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputtextmessagecontent
 *
 * Represents the content of a text 
 * message to be sent as the result of an inline query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputTextMessageContent extends AbstractInputMessageContent
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'message_text',
            'parse_mode',
            'disable_web_page_preview',
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
            'message_text' => $this->getMessageText(),
            'parse_mode' => $this->getParseMode(),
            'disable_web_page_preview' => $this->getDisableWebPagePreview(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Text of the message to be sent, 1-4096 characters
     *
     * @var string
     * @SerializedName("message_text")
     * @Accessor(getter="getMessageText",setter="setmessageText")
     * @Type("string")
     */
    protected $messageText;

    /**
     * Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot&#039;s message.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("parse_mode")
     * @Accessor(getter="getParseMode",setter="setparseMode")
     * @Type("string")
     */
    protected $parseMode;

    /**
     * Optional. Disables link previews for links in the sent message
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("disable_web_page_preview")
     * @Accessor(getter="getDisableWebPagePreview",setter="setdisableWebPagePreview")
     * @Type("bool")
     */
    protected $disableWebPagePreview;


    /**
     * @param string $messageText
     * @return static
     */
    public function setMessageText(string $messageText): self
    {
        $this->messageText = $messageText;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessageText(): string
    {
        return $this->messageText;
    }

    /**
     * @param string $parseMode
     * @return static
     */
    public function setParseMode(string $parseMode): self
    {
        $this->parseMode = $parseMode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getParseMode(): ?string
    {
        return $this->parseMode;
    }

    /**
     * @param bool $disableWebPagePreview
     * @return static
     */
    public function setDisableWebPagePreview(bool $disableWebPagePreview): self
    {
        $this->disableWebPagePreview = $disableWebPagePreview;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDisableWebPagePreview(): ?bool
    {
        return $this->disableWebPagePreview;
    }

}