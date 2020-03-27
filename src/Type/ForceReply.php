<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#forcereply
 *
 * Upon receiving a message with this object, Telegram clients will display a reply interface to the user (act as if the 
 * user has selected the bot‘s message and tapped ’Reply'). This can be extremely useful if you want to create 
 * user-friendly step-by-step interfaces without having to sacrifice privacy mode. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ForceReply extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'force_reply',
            'selective',
        ];
    }

    /**
     * Returns associative array of raw data
     *
     * @return array
     */
    public function _getRawData(): array
    {
        $result = [
            'force_reply' => $this->getForceReply(),
            'selective' => $this->getSelective(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Shows reply interface to the user, as if they manually selected the bot‘s message and tapped ’Reply&#039;
     *
     * @var bool
     * @SerializedName("force_reply")
     * @Accessor(getter="getForceReply",setter="setForceReply")
     * @Type("bool")
     */
    protected $forceReply;

    /**
     * Optional. Use this parameter if you want to force reply from specific users only. Targets: 1) users that are @mentioned in the text of the Message object; 2) if the bot&#039;s message is a reply (has reply_to_message_id), sender of the original message.
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("selective")
     * @Accessor(getter="getSelective",setter="setSelective")
     * @Type("bool")
     */
    protected $selective;


    /**
     * @param bool $forceReply
     * @return static
     */
    public function setForceReply(bool $forceReply): self
    {
        $this->forceReply = $forceReply;

        return $this;
    }

    /**
     * @return bool
     */
    public function getForceReply(): bool
    {
        return $this->forceReply;
    }

    /**
     * @param bool $selective
     * @return static
     */
    public function setSelective(bool $selective): self
    {
        $this->selective = $selective;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSelective(): ?bool
    {
        return $this->selective;
    }

}