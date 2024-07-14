<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#keyboardbuttonrequestusers
 *
 * This object defines the criteria used to request suitable users. Information about the selected users will be shared 
 * with the bot when the corresponding button is pressed. More about 
 * requesting users » 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class KeyboardButtonRequestUsers extends AbstractType
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
            'max_quantity',
            'request_name',
            'request_username',
            'request_photo',
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
            'max_quantity' => $this->getMaxQuantity(),
            'request_name' => $this->getRequestName(),
            'request_username' => $this->getRequestUsername(),
            'request_photo' => $this->getRequestPhoto(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must be unique within 
     * the message 
     *
     * @var int
     * @SerializedName("request_id")
     * @Accessor(getter="getRequestId", setter="setRequestId")
     * @Type("int")
     */
    protected $requestId;

    /**
     * Optional. Pass True to request bots, pass False to request regular users. If not specified, no additional 
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
     * Optional. Pass True to request premium users, pass False to request non-premium users. If not specified, no 
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
     * Optional. The maximum number of users to be selected; 1-10. Defaults to 1. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("max_quantity")
     * @Accessor(getter="getMaxQuantity", setter="setMaxQuantity")
     * @Type("int")
     */
    protected $maxQuantity;

    /**
     * Optional. Pass True to request the users' first and last names 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_name")
     * @Accessor(getter="getRequestName", setter="setRequestName")
     * @Type("bool")
     */
    protected $requestName;

    /**
     * Optional. Pass True to request the users' usernames 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_username")
     * @Accessor(getter="getRequestUsername", setter="setRequestUsername")
     * @Type("bool")
     */
    protected $requestUsername;

    /**
     * Optional. Pass True to request the users' photos 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("request_photo")
     * @Accessor(getter="getRequestPhoto", setter="setRequestPhoto")
     * @Type("bool")
     */
    protected $requestPhoto;


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

    /**
     * @param int $maxQuantity
     * @return static
     */
    public function setMaxQuantity(int $maxQuantity): self
    {
        $this->maxQuantity = $maxQuantity;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxQuantity(): ?int
    {
        return $this->maxQuantity;
    }

    /**
     * @param bool $requestName
     * @return static
     */
    public function setRequestName(bool $requestName): self
    {
        $this->requestName = $requestName;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestName(): ?bool
    {
        return $this->requestName;
    }

    /**
     * @param bool $requestUsername
     * @return static
     */
    public function setRequestUsername(bool $requestUsername): self
    {
        $this->requestUsername = $requestUsername;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestUsername(): ?bool
    {
        return $this->requestUsername;
    }

    /**
     * @param bool $requestPhoto
     * @return static
     */
    public function setRequestPhoto(bool $requestPhoto): self
    {
        $this->requestPhoto = $requestPhoto;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequestPhoto(): ?bool
    {
        return $this->requestPhoto;
    }

}