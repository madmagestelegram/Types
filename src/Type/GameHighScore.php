<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#gamehighscore
 *
 * This object represents one row of the high scores table for a game. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class GameHighScore extends AbstractType
{
    /**
     * Position in high score table for the game
     *
     * @var int
     * @SerializedName("position")
     * @Accessor(getter="getPosition",setter="setposition")
     * @Type("int")
     */
    protected $position;

    /**
     * User
     *
     * @var User
     * @SerializedName("user")
     * @Accessor(getter="getUser",setter="setuser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;

    /**
     * Score
     *
     * @var int
     * @SerializedName("score")
     * @Accessor(getter="getScore",setter="setscore")
     * @Type("int")
     */
    protected $score;


    /**
     * @param int $position
     * @return static
     */
    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
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
     * @param int $score
     * @return static
     */
    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

}