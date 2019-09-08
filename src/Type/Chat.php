<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#chat
 *
 * This object represents a chat. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Chat extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'id',
            'type',
            'title',
            'username',
            'first_name',
            'last_name',
            'photo',
            'description',
            'invite_link',
            'pinned_message',
            'permissions',
            'sticker_set_name',
            'can_set_sticker_set',
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
            'id' => $this->getId(),
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'username' => $this->getUsername(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'photo' => $this->getPhoto(),
            'description' => $this->getDescription(),
            'invite_link' => $this->getInviteLink(),
            'pinned_message' => $this->getPinnedMessage(),
            'permissions' => $this->getPermissions(),
            'sticker_set_name' => $this->getStickerSetName(),
            'can_set_sticker_set' => $this->getCanSetStickerSet(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Unique identifier for this chat. This number may be greater than 32 bits and some programming languages may have difficulty/silent defects in interpreting it. But it is smaller than 52 bits, so a signed 64 bit integer or double-precision float type are safe for storing this identifier.
     *
     * @var int
     * @SerializedName("id")
     * @Accessor(getter="getId",setter="setid")
     * @Type("int")
     */
    protected $id;

    /**
     * Type of chat, can be either “private”, “group”, “supergroup” or “channel”
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType",setter="settype")
     * @Type("string")
     */
    protected $type;

    /**
     * Optional. Title, for supergroups, channels and group chats
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="settitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Optional. Username, for private chats, supergroups and channels if available
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("username")
     * @Accessor(getter="getUsername",setter="setusername")
     * @Type("string")
     */
    protected $username;

    /**
     * Optional. First name of the other party in a private chat
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("first_name")
     * @Accessor(getter="getFirstName",setter="setfirstName")
     * @Type("string")
     */
    protected $firstName;

    /**
     * Optional. Last name of the other party in a private chat
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("last_name")
     * @Accessor(getter="getLastName",setter="setlastName")
     * @Type("string")
     */
    protected $lastName;

    /**
     * Optional. Chat photo. Returned only in getChat.
     *
     * @var ChatPhoto|null
     * @SkipWhenEmpty
     * @SerializedName("photo")
     * @Accessor(getter="getPhoto",setter="setphoto")
     * @Type("MadmagesTelegram\Types\Type\ChatPhoto")
     */
    protected $photo;

    /**
     * Optional. Description, for groups, supergroups and channel chats. Returned only in getChat.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("description")
     * @Accessor(getter="getDescription",setter="setdescription")
     * @Type("string")
     */
    protected $description;

    /**
     * Optional. Chat invite link, for groups, supergroups and channel chats. Each administrator in a chat generates their own invite links, so the bot must first generate the link using exportChatInviteLink. Returned only in getChat.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("invite_link")
     * @Accessor(getter="getInviteLink",setter="setinviteLink")
     * @Type("string")
     */
    protected $inviteLink;

    /**
     * Optional. Pinned message, for groups, supergroups and channels. Returned only in getChat.
     *
     * @var Message|null
     * @SkipWhenEmpty
     * @SerializedName("pinned_message")
     * @Accessor(getter="getPinnedMessage",setter="setpinnedMessage")
     * @Type("MadmagesTelegram\Types\Type\Message")
     */
    protected $pinnedMessage;

    /**
     * Optional. Default chat member permissions, for groups and supergroups. Returned only in getChat.
     *
     * @var ChatPermissions|null
     * @SkipWhenEmpty
     * @SerializedName("permissions")
     * @Accessor(getter="getPermissions",setter="setpermissions")
     * @Type("MadmagesTelegram\Types\Type\ChatPermissions")
     */
    protected $permissions;

    /**
     * Optional. For supergroups, name of group sticker set. Returned only in getChat.
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("sticker_set_name")
     * @Accessor(getter="getStickerSetName",setter="setstickerSetName")
     * @Type("string")
     */
    protected $stickerSetName;

    /**
     * Optional. True, if the bot can change the group sticker set. Returned only in getChat.
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("can_set_sticker_set")
     * @Accessor(getter="getCanSetStickerSet",setter="setcanSetStickerSet")
     * @Type("bool")
     */
    protected $canSetStickerSet;


    /**
     * @param int $id
     * @return static
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

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
     * @param string $title
     * @return static
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $username
     * @return static
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $firstName
     * @return static
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     * @return static
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param ChatPhoto $photo
     * @return static
     */
    public function setPhoto(ChatPhoto $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return ChatPhoto|null
     */
    public function getPhoto(): ?ChatPhoto
    {
        return $this->photo;
    }

    /**
     * @param string $description
     * @return static
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

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
     * @return string|null
     */
    public function getInviteLink(): ?string
    {
        return $this->inviteLink;
    }

    /**
     * @param Message $pinnedMessage
     * @return static
     */
    public function setPinnedMessage(Message $pinnedMessage): self
    {
        $this->pinnedMessage = $pinnedMessage;

        return $this;
    }

    /**
     * @return Message|null
     */
    public function getPinnedMessage(): ?Message
    {
        return $this->pinnedMessage;
    }

    /**
     * @param ChatPermissions $permissions
     * @return static
     */
    public function setPermissions(ChatPermissions $permissions): self
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * @return ChatPermissions|null
     */
    public function getPermissions(): ?ChatPermissions
    {
        return $this->permissions;
    }

    /**
     * @param string $stickerSetName
     * @return static
     */
    public function setStickerSetName(string $stickerSetName): self
    {
        $this->stickerSetName = $stickerSetName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStickerSetName(): ?string
    {
        return $this->stickerSetName;
    }

    /**
     * @param bool $canSetStickerSet
     * @return static
     */
    public function setCanSetStickerSet(bool $canSetStickerSet): self
    {
        $this->canSetStickerSet = $canSetStickerSet;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getCanSetStickerSet(): ?bool
    {
        return $this->canSetStickerSet;
    }

}