<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#passportelementerrordatafield
 *
 * Represents an issue in one of the data fields that was provided by the user. The error is considered resolved when the 
 * field's value changes. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PassportElementErrorDataField extends AbstractPassportElementError
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'source',
            'type',
            'field_name',
            'data_hash',
            'message',
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
            'source' => $this->getSource(),
            'type' => $this->getType(),
            'field_name' => $this->getFieldName(),
            'data_hash' => $this->getDataHash(),
            'message' => $this->getMessage(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Error source, must be data 
     *
     * @var string
     * @SerializedName("source")
     * @Accessor(getter="getSource",setter="setSource")
     * @Type("string")
     */
    protected $source;

    /**
     * The section of the user's Telegram Passport which has the error, one of “personal_details”, “passport”, 
     * “driver_license”, “identity_card”, “internal_passport”, “address” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Name of the data field which has the error 
     *
     * @var string
     * @SerializedName("field_name")
     * @Accessor(getter="getFieldName",setter="setFieldName")
     * @Type("string")
     */
    protected $fieldName;

    /**
     * Base64-encoded data hash 
     *
     * @var string
     * @SerializedName("data_hash")
     * @Accessor(getter="getDataHash",setter="setDataHash")
     * @Type("string")
     */
    protected $dataHash;

    /**
     * Error message 
     *
     * @var string
     * @SerializedName("message")
     * @Accessor(getter="getMessage",setter="setMessage")
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
     * @param string $fieldName
     * @return static
     */
    public function setFieldName(string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->fieldName;
    }

    /**
     * @param string $dataHash
     * @return static
     */
    public function setDataHash(string $dataHash): self
    {
        $this->dataHash = $dataHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getDataHash(): string
    {
        return $this->dataHash;
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