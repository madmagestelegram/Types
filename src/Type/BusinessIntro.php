<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#businessintro
 *
 * Contains information about the start page settings of a Telegram Business account. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BusinessIntro extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'title',
            'message',
            'sticker',
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
            'title' => $this->getTitle(),
            'message' => $this->getMessage(),
            'sticker' => $this->getSticker(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. Title text of the business intro 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle", setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Message text of the business intro 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("message")
     * @Accessor(getter="getMessage", setter="setMessage")
     * @Type("string")
     */
    protected $message;

    /**
     * Optional. Sticker of the business intro 
     *
     * @var Sticker|null
     * @SkipWhenEmpty
     * @SerializedName("sticker")
     * @Accessor(getter="getSticker", setter="setSticker")
     * @Type("MadmagesTelegram\Types\Type\Sticker")
     */
    protected $sticker;


    /**
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
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
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param Sticker $sticker
     * @return static
     */
    public function setSticker(Sticker $sticker): self
    {
        $this->sticker = $sticker;

        return $this;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

}