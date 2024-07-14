<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#userchatboosts
 *
 * This object represents a list of boosts added to a chat by a user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class UserChatBoosts extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'boosts',
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
            'boosts' => $this->getBoosts(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * The list of boosts added to the chat by the user 
     *
     * @var ChatBoost[]
     * @SerializedName("boosts")
     * @Accessor(getter="getBoosts", setter="setBoosts")
     * @Type("array<MadmagesTelegram\Types\Type\ChatBoost>")
     */
    protected $boosts;


    /**
     * @param ChatBoost[] $boosts
     * @return static
     */
    public function setBoosts(array $boosts): self
    {
        $this->boosts = $boosts;

        return $this;
    }

    /**
     * @return ChatBoost[]
     */
    public function getBoosts(): array
    {
        return $this->boosts;
    }

}