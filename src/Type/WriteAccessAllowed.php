<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#writeaccessallowed
 *
 * This object represents a service message about a user allowing a bot to write messages after adding the bot to the 
 * attachment menu or launching a Web App from a link. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class WriteAccessAllowed extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'web_app_name',
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
            'web_app_name' => $this->getWebAppName(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. Name of the Web App which was launched from a link 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("web_app_name")
     * @Accessor(getter="getWebAppName", setter="setWebAppName")
     * @Type("string")
     */
    protected $webAppName;


    /**
     * @param string $webAppName
     * @return static
     */
    public function setWebAppName(string $webAppName): self
    {
        $this->webAppName = $webAppName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWebAppName(): ?string
    {
        return $this->webAppName;
    }

}