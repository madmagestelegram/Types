<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#sentwebappmessage
 *
 * Describes an inline message sent by a Web App on behalf of a user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class SentWebAppMessage extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'inline_message_id',
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
            'inline_message_id' => $this->getInlineMessageId(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the 
     * message. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("inline_message_id")
     * @Accessor(getter="getInlineMessageId",setter="setInlineMessageId")
     * @Type("string")
     */
    protected $inlineMessageId;


    /**
     * @param string $inlineMessageId
     * @return static
     */
    public function setInlineMessageId(string $inlineMessageId): self
    {
        $this->inlineMessageId = $inlineMessageId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInlineMessageId(): ?string
    {
        return $this->inlineMessageId;
    }

}