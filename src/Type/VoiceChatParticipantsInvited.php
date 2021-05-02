<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#voicechatparticipantsinvited
 *
 * This object represents a service message about new members invited to a voice chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class VoiceChatParticipantsInvited extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'users',
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
            'users' => $this->getUsers(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Optional. New members that were invited to the voice chat 
     *
     * @var User[]|null
     * @SkipWhenEmpty
     * @SerializedName("users")
     * @Accessor(getter="getUsers",setter="setUsers")
     * @Type("array<MadmagesTelegram\Types\Type\User>")
     */
    protected $users;


    /**
     * @param User[] $users
     * @return static
     */
    public function setUsers(array $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getUsers(): ?array
    {
        return $this->users;
    }

}