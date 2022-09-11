<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatmemberowner
 *
 * Represents a chat member that owns the chat and has all administrator privileges. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatMemberOwner extends AbstractChatMember
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'status',
            'user',
            'is_anonymous',
            'custom_title',
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
            'status' => $this->getStatus(),
            'user' => $this->getUser(),
            'is_anonymous' => $this->getIsAnonymous(),
            'custom_title' => $this->getCustomTitle(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The member's status in the chat, always “creator” 
     *
     * @var string
     * @SerializedName("status")
     * @Accessor(getter="getStatus", setter="setStatus")
     * @Type("string")
     */
    protected $status;

    /**
     * Information about the user 
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser", setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * True, if the user's presence in the chat is hidden 
     *
     * @var bool
     * @SerializedName("is_anonymous")
     * @Accessor(getter="getIsAnonymous", setter="setIsAnonymous")
     * @Type("bool")
     */
    protected $isAnonymous;

    /**
     * Optional. Custom title for this user 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("custom_title")
     * @Accessor(getter="getCustomTitle", setter="setCustomTitle")
     * @Type("string")
     */
    protected $customTitle;


    /**
     * @param string $status
     * @return static
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param User $user
     * @return static
     */
    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param bool $isAnonymous
     * @return static
     */
    public function setIsAnonymous(bool $isAnonymous): self
    {
        $this->isAnonymous = $isAnonymous;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAnonymous(): bool
    {
        return $this->isAnonymous;
    }

    /**
     * @param string $customTitle
     * @return static
     */
    public function setCustomTitle(string $customTitle): self
    {
        $this->customTitle = $customTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomTitle(): ?string
    {
        return $this->customTitle;
    }

}