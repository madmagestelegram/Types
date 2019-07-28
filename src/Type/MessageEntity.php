<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#messageentity
 *
 * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class MessageEntity extends AbstractType
{
    /**
     * Type of the entity. Can be mention (@username), hashtag, cashtag, bot_command, url, email, phone_number, bold (bold text), italic (italic text), code (monowidth string), pre (monowidth block), text_link (for clickable text URLs), text_mention (for users without usernames)
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="settype")
     * @Type("string")
     */
    protected $type;

    /**
     * Offset in UTF-16 code units to the start of the entity
     *
     * @var int
     * @SerializedName("offset")
     * @Accessor(getter="getOffset",setter="setoffset")
     * @Type("int")
     */
    protected $offset;

    /**
     * Length of the entity in UTF-16 code units
     *
     * @var int
     * @SerializedName("length")
     * @Accessor(getter="getLength",setter="setlength")
     * @Type("int")
     */
    protected $length;

    /**
     * Optional. For “text_link” only, url that will be opened after user taps on the text
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("url")
     * @Accessor(getter="getUrl",setter="seturl")
     * @Type("string")
     */
    protected $url;

    /**
     * Optional. For “text_mention” only, the mentioned user
     *
     * @var User|null
     * @SkipWhenEmpty
     * @SerializedName("user")
     * @Accessor(getter="getUser",setter="setuser")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $user;


    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param int $offset
     * @return static
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $length
     * @return static
     */
    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param string $url
     * @return static
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
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
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

}