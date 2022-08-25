<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#webappinfo
 *
 * Describes a Web App. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class WebAppInfo extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'url',
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
            'url' => $this->getUrl(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps 
     *
     * @var string
     * @SerializedName("url")
     * @Accessor(getter="getUrl",setter="setUrl")
     * @Type("string")
     */
    protected $url;


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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

}