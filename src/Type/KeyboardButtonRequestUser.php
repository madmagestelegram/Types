<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#keyboardbuttonrequestuser
 *
 * This object defines the criteria used to request a suitable user. The identifier of the selected user will be shared 
 * with the bot when the corresponding button is pressed. More about 
 * requesting users » 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class KeyboardButtonRequestUser extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'request_id',
            'user_is_bot',
            'user_is_premium',
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
            'request_id' => $this->getRequestId(),
            'user_is_bot' => $this->getUserIsBot(),
            'user_is_premium' => $this->getUserIsPremium(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Signed 32-bit identifier of the request, which will be received back in the UserShared object. Must be unique within 
     * the message 
     *
     * @var int
     * @SerializedName("request_id")
     * @Accessor(getter="getRequestId", setter="setRequestId")
     * @Type("int")
     */
    protected $requestId;

    /**
     * Optional. Pass True to request a bot, pass False to request a regular user. If not specified, no additional 
     * restrictions are applied. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("user_is_bot")
     * @Accessor(getter="getUserIsBot", setter="setUserIsBot")
     * @Type("bool")
     */
    protected $userIsBot;

    /**
     * Optional. Pass True to request a premium user, pass False to request a non-premium user. If not specified, no 
     * additional restrictions are applied. 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("user_is_premium")
     * @Accessor(getter="getUserIsPremium", setter="setUserIsPremium")
     * @Type("bool")
     */
    protected $userIsPremium;


    /**
     * @param int $requestId
     * @return static
     */
    public function setRequestId(int $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @return int
     */
    public function getRequestId(): int
    {
        return $this->requestId;
    }

    /**
     * @param bool $userIsBot
     * @return static
     */
    public function setUserIsBot(bool $userIsBot): self
    {
        $this->userIsBot = $userIsBot;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getUserIsBot(): ?bool
    {
        return $this->userIsBot;
    }

    /**
     * @param bool $userIsPremium
     * @return static
     */
    public function setUserIsPremium(bool $userIsPremium): self
    {
        $this->userIsPremium = $userIsPremium;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getUserIsPremium(): ?bool
    {
        return $this->userIsPremium;
    }

}