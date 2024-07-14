<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#linkpreviewoptions
 *
 * Describes the options used for link preview generation. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class LinkPreviewOptions extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'is_disabled',
            'url',
            'prefer_small_media',
            'prefer_large_media',
            'show_above_text',
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
            'is_disabled' => $this->getIsDisabled(),
            'url' => $this->getUrl(),
            'prefer_small_media' => $this->getPreferSmallMedia(),
            'prefer_large_media' => $this->getPreferLargeMedia(),
            'show_above_text' => $this->getShowAboveText(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. True, if the link preview is disabled 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_disabled")
     * @Accessor(getter="getIsDisabled", setter="setIsDisabled")
     * @Type("bool")
     */
    protected $isDisabled;

    /**
     * Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("url")
     * @Accessor(getter="getUrl", setter="setUrl")
     * @Type("string")
     */
    protected $url;

    /**
     * Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly 
     * specified or media size change isn't supported for the preview 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("prefer_small_media")
     * @Accessor(getter="getPreferSmallMedia", setter="setPreferSmallMedia")
     * @Type("bool")
     */
    protected $preferSmallMedia;

    /**
     * Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't explicitly 
     * specified or media size change isn't supported for the preview 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("prefer_large_media")
     * @Accessor(getter="getPreferLargeMedia", setter="setPreferLargeMedia")
     * @Type("bool")
     */
    protected $preferLargeMedia;

    /**
     * Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be shown 
     * below the message text 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("show_above_text")
     * @Accessor(getter="getShowAboveText", setter="setShowAboveText")
     * @Type("bool")
     */
    protected $showAboveText;


    /**
     * @param bool $isDisabled
     * @return static
     */
    public function setIsDisabled(bool $isDisabled): self
    {
        $this->isDisabled = $isDisabled;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsDisabled(): ?bool
    {
        return $this->isDisabled;
    }

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
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param bool $preferSmallMedia
     * @return static
     */
    public function setPreferSmallMedia(bool $preferSmallMedia): self
    {
        $this->preferSmallMedia = $preferSmallMedia;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPreferSmallMedia(): ?bool
    {
        return $this->preferSmallMedia;
    }

    /**
     * @param bool $preferLargeMedia
     * @return static
     */
    public function setPreferLargeMedia(bool $preferLargeMedia): self
    {
        $this->preferLargeMedia = $preferLargeMedia;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPreferLargeMedia(): ?bool
    {
        return $this->preferLargeMedia;
    }

    /**
     * @param bool $showAboveText
     * @return static
     */
    public function setShowAboveText(bool $showAboveText): self
    {
        $this->showAboveText = $showAboveText;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowAboveText(): ?bool
    {
        return $this->showAboveText;
    }

}