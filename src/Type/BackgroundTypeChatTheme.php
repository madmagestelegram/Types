<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#backgroundtypechattheme
 *
 * The background is taken directly from a built-in chat theme. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BackgroundTypeChatTheme extends AbstractBackgroundType
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
            'theme_name',
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
            'theme_name' => $this->getThemeName(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Type of the background, always “chat_theme” 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Name of the chat theme, which is usually an emoji 
     *
     * @var string
     * @SerializedName("theme_name")
     * @Accessor(getter="getThemeName", setter="setThemeName")
     * @Type("string")
     */
    protected $themeName;


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
     * @param string $themeName
     * @return static
     */
    public function setThemeName(string $themeName): self
    {
        $this->themeName = $themeName;

        return $this;
    }

    /**
     * @return string
     */
    public function getThemeName(): string
    {
        return $this->themeName;
    }

}