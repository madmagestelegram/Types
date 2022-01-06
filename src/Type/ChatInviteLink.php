<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chatinvitelink
 *
 * Represents an invite link for a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ChatInviteLink extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'invite_link',
            'creator',
            'creates_join_request',
            'is_primary',
            'is_revoked',
            'name',
            'expire_date',
            'member_limit',
            'pending_join_request_count',
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
            'invite_link' => $this->getInviteLink(),
            'creator' => $this->getCreator(),
            'creates_join_request' => $this->getCreatesJoinRequest(),
            'is_primary' => $this->getIsPrimary(),
            'is_revoked' => $this->getIsRevoked(),
            'name' => $this->getName(),
            'expire_date' => $this->getExpireDate(),
            'member_limit' => $this->getMemberLimit(),
            'pending_join_request_count' => $this->getPendingJoinRequestCount(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The invite link. If the link was created by another chat administrator, then the second part of the link will be 
     * replaced with “…”. 
     *
     * @var string
     * @SerializedName("invite_link")
     * @Accessor(getter="getInviteLink",setter="setInviteLink")
     * @Type("string")
     */
    protected $inviteLink;

    /**
     * Creator of the link 
     *
     * @var User
     * @SerializedName("creator")
     * @Accessor(getter="getCreator",setter="setCreator")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $creator;

    /**
     * True, if users joining the chat via the link need to be approved by chat administrators 
     *
     * @var bool
     * @SerializedName("creates_join_request")
     * @Accessor(getter="getCreatesJoinRequest",setter="setCreatesJoinRequest")
     * @Type("bool")
     */
    protected $createsJoinRequest;

    /**
     * True, if the link is primary 
     *
     * @var bool
     * @SerializedName("is_primary")
     * @Accessor(getter="getIsPrimary",setter="setIsPrimary")
     * @Type("bool")
     */
    protected $isPrimary;

    /**
     * True, if the link is revoked 
     *
     * @var bool
     * @SerializedName("is_revoked")
     * @Accessor(getter="getIsRevoked",setter="setIsRevoked")
     * @Type("bool")
     */
    protected $isRevoked;

    /**
     * Optional. Invite link name 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("name")
     * @Accessor(getter="getName",setter="setName")
     * @Type("string")
     */
    protected $name;

    /**
     * Optional. Point in time (Unix timestamp) when the link will expire or has been expired 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("expire_date")
     * @Accessor(getter="getExpireDate",setter="setExpireDate")
     * @Type("int")
     */
    protected $expireDate;

    /**
     * Optional. Maximum number of users that can be members of the chat simultaneously after joining the chat via this 
     * invite link; 1-99999 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("member_limit")
     * @Accessor(getter="getMemberLimit",setter="setMemberLimit")
     * @Type("int")
     */
    protected $memberLimit;

    /**
     * Optional. Number of pending join requests created using this link 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("pending_join_request_count")
     * @Accessor(getter="getPendingJoinRequestCount",setter="setPendingJoinRequestCount")
     * @Type("int")
     */
    protected $pendingJoinRequestCount;


    /**
     * @param string $inviteLink
     * @return static
     */
    public function setInviteLink(string $inviteLink): self
    {
        $this->inviteLink = $inviteLink;

        return $this;
    }

    /**
     * @return string
     */
    public function getInviteLink(): string
    {
        return $this->inviteLink;
    }

    /**
     * @param User $creator
     * @return static
     */
    public function setCreator(User $creator): self
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * @return User
     */
    public function getCreator(): User
    {
        return $this->creator;
    }

    /**
     * @param bool $createsJoinRequest
     * @return static
     */
    public function setCreatesJoinRequest(bool $createsJoinRequest): self
    {
        $this->createsJoinRequest = $createsJoinRequest;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCreatesJoinRequest(): bool
    {
        return $this->createsJoinRequest;
    }

    /**
     * @param bool $isPrimary
     * @return static
     */
    public function setIsPrimary(bool $isPrimary): self
    {
        $this->isPrimary = $isPrimary;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPrimary(): bool
    {
        return $this->isPrimary;
    }

    /**
     * @param bool $isRevoked
     * @return static
     */
    public function setIsRevoked(bool $isRevoked): self
    {
        $this->isRevoked = $isRevoked;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsRevoked(): bool
    {
        return $this->isRevoked;
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param int $expireDate
     * @return static
     */
    public function setExpireDate(int $expireDate): self
    {
        $this->expireDate = $expireDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getExpireDate(): ?int
    {
        return $this->expireDate;
    }

    /**
     * @param int $memberLimit
     * @return static
     */
    public function setMemberLimit(int $memberLimit): self
    {
        $this->memberLimit = $memberLimit;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMemberLimit(): ?int
    {
        return $this->memberLimit;
    }

    /**
     * @param int $pendingJoinRequestCount
     * @return static
     */
    public function setPendingJoinRequestCount(int $pendingJoinRequestCount): self
    {
        $this->pendingJoinRequestCount = $pendingJoinRequestCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPendingJoinRequestCount(): ?int
    {
        return $this->pendingJoinRequestCount;
    }

}