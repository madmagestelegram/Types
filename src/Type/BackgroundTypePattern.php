<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#backgroundtypepattern
 *
 * The background is a .PNG or .TGV (gzipped subset of SVG with MIME type “application/x-tgwallpattern”) pattern 
 * to be combined with the background fill chosen by the user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BackgroundTypePattern extends AbstractBackgroundType
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
            'document',
            'fill',
            'intensity',
            'is_inverted',
            'is_moving',
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
            'document' => $this->getDocument(),
            'fill' => $this->getFill(),
            'intensity' => $this->getIntensity(),
            'is_inverted' => $this->getIsInverted(),
            'is_moving' => $this->getIsMoving(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the background, always “pattern” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Document with the pattern 
     *
     * @var Document
     * @SerializedName("document")
     * @Accessor(getter="getDocument", setter="setDocument")
     * @Type("MadmagesTelegram\Types\Type\Document")
     */
    protected $document;

    /**
     * The background fill that is combined with the pattern 
     *
     * @var AbstractBackgroundFill
     * @SerializedName("fill")
     * @Accessor(getter="getFill", setter="setFill")
     * @Type("MadmagesTelegram\Types\Type\AbstractBackgroundFill")
     */
    protected $fill;

    /**
     * Intensity of the pattern when it is shown above the filled background; 0-100 
     *
     * @var int
     * @SerializedName("intensity")
     * @Accessor(getter="getIntensity", setter="setIntensity")
     * @Type("int")
     */
    protected $intensity;

    /**
     * Optional. True, if the background fill must be applied only to the pattern itself. All other pixels are black in this 
     * case. For dark themes only 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_inverted")
     * @Accessor(getter="getIsInverted", setter="setIsInverted")
     * @Type("bool")
     */
    protected $isInverted;

    /**
     * Optional. True, if the background moves slightly when the device is tilted 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_moving")
     * @Accessor(getter="getIsMoving", setter="setIsMoving")
     * @Type("bool")
     */
    protected $isMoving;


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
     * @param Document $document
     * @return static
     */
    public function setDocument(Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return Document
     */
    public function getDocument(): Document
    {
        return $this->document;
    }

    /**
     * @param AbstractBackgroundFill $fill
     * @return static
     */
    public function setFill(AbstractBackgroundFill $fill): self
    {
        $this->fill = $fill;

        return $this;
    }

    /**
     * @return AbstractBackgroundFill
     */
    public function getFill(): AbstractBackgroundFill
    {
        return $this->fill;
    }

    /**
     * @param int $intensity
     * @return static
     */
    public function setIntensity(int $intensity): self
    {
        $this->intensity = $intensity;

        return $this;
    }

    /**
     * @return int
     */
    public function getIntensity(): int
    {
        return $this->intensity;
    }

    /**
     * @param bool $isInverted
     * @return static
     */
    public function setIsInverted(bool $isInverted): self
    {
        $this->isInverted = $isInverted;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsInverted(): ?bool
    {
        return $this->isInverted;
    }

    /**
     * @param bool $isMoving
     * @return static
     */
    public function setIsMoving(bool $isMoving): self
    {
        $this->isMoving = $isMoving;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsMoving(): ?bool
    {
        return $this->isMoving;
    }

}