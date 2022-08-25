<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#videochatparticipantsinvited
 *
 * This object represents a service message about new members invited to a video chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class VideoChatParticipantsInvited extends AbstractType
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
     * New members that were invited to the video chat 
     *
     * @var User[]
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
     * @return User[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }

}