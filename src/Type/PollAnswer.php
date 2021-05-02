<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#pollanswer
 *
 * This object represents an answer of a user in a non-anonymous poll. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PollAnswer extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'poll_id',
            'user',
            'option_ids',
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
            'poll_id' => $this->getPollId(),
            'user' => $this->getUser(),
            'option_ids' => $this->getOptionIds(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique poll identifier 
     *
     * @var string
     * @SerializedName("poll_id")
     * @Accessor(getter="getPollId",setter="setPollId")
     * @Type("string")
     */
    protected $pollId;

    /**
     * The user, who changed the answer to the poll 
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser",setter="setUser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * 0-based identifiers of answer options, chosen by the user. May be empty if the user retracted their vote. 
     *
     * @var int[]
     * @SerializedName("option_ids")
     * @Accessor(getter="getOptionIds",setter="setOptionIds")
     * @Type("array<int>")
     */
    protected $optionIds;


    /**
     * @param string $pollId
     * @return static
     */
    public function setPollId(string $pollId): self
    {
        $this->pollId = $pollId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPollId(): string
    {
        return $this->pollId;
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
     * @param int[] $optionIds
     * @return static
     */
    public function setOptionIds(array $optionIds): self
    {
        $this->optionIds = $optionIds;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getOptionIds(): array
    {
        return $this->optionIds;
    }

}