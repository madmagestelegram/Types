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
 * This object represents a service message about a user allowing a bot to write messages after adding it to the 
 * attachment menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess. 
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
            'from_request',
            'web_app_name',
            'from_attachment_menu',
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
            'from_request' => $this->getFromRequest(),
            'web_app_name' => $this->getWebAppName(),
            'from_attachment_menu' => $this->getFromAttachmentMenu(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method 
     * requestWriteAccess 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("from_request")
     * @Accessor(getter="getFromRequest", setter="setFromRequest")
     * @Type("bool")
     */
    protected $fromRequest;

    /**
     * Optional. Name of the Web App, if the access was granted when the Web App was launched from a link 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("web_app_name")
     * @Accessor(getter="getWebAppName", setter="setWebAppName")
     * @Type("string")
     */
    protected $webAppName;

    /**
     * Optional. True, if the access was granted when the bot was added to the attachment or side menu 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("from_attachment_menu")
     * @Accessor(getter="getFromAttachmentMenu", setter="setFromAttachmentMenu")
     * @Type("bool")
     */
    protected $fromAttachmentMenu;


    /**
     * @param bool $fromRequest
     * @return static
     */
    public function setFromRequest(bool $fromRequest): self
    {
        $this->fromRequest = $fromRequest;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFromRequest(): ?bool
    {
        return $this->fromRequest;
    }

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

    /**
     * @param bool $fromAttachmentMenu
     * @return static
     */
    public function setFromAttachmentMenu(bool $fromAttachmentMenu): self
    {
        $this->fromAttachmentMenu = $fromAttachmentMenu;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFromAttachmentMenu(): ?bool
    {
        return $this->fromAttachmentMenu;
    }

}