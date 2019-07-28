<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#passportelementerrorunspecified
 *
 * Represents an issue in an unspecified place. The error is considered resolved when new data is added. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PassportElementErrorUnspecified extends AbstractPassportElementError
{
    /**
     * Error source, must be unspecified
     *
     * @var string
     * @SerializedName("source")
     * @Accessor(getter="getSource",setter="setsource")
     * @Type("string")
     */
    protected $source;

    /**
     * Type of element of the user&#039;s Telegram Passport which has the issue
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="settype")
     * @Type("string")
     */
    protected $type;

    /**
     * Base64-encoded element hash
     *
     * @var string
     * @SerializedName("element_hash")
     * @Accessor(getter="getElementHash",setter="setelementHash")
     * @Type("string")
     */
    protected $elementHash;

    /**
     * Error message
     *
     * @var string
     * @SerializedName("message")
     * @Accessor(getter="getMessage",setter="setmessage")
     * @Type("string")
     */
    protected $message;


    /**
     * @param string $source
     * @return static
     */
    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

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
     * @param string $elementHash
     * @return static
     */
    public function setElementHash(string $elementHash): self
    {
        $this->elementHash = $elementHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getElementHash(): string
    {
        return $this->elementHash;
    }

    /**
     * @param string $message
     * @return static
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

}