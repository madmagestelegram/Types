<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#externalreplyinfo
 *
 * This object contains information about a message that is being replied to, which may come from another chat or forum 
 * topic. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ExternalReplyInfo extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'origin',
            'chat',
            'message_id',
            'link_preview_options',
            'animation',
            'audio',
            'document',
            'paid_media',
            'photo',
            'sticker',
            'story',
            'video',
            'video_note',
            'voice',
            'has_media_spoiler',
            'contact',
            'dice',
            'game',
            'giveaway',
            'giveaway_winners',
            'invoice',
            'location',
            'poll',
            'venue',
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
            'origin' => $this->getOrigin(),
            'chat' => $this->getChat(),
            'message_id' => $this->getMessageId(),
            'link_preview_options' => $this->getLinkPreviewOptions(),
            'animation' => $this->getAnimation(),
            'audio' => $this->getAudio(),
            'document' => $this->getDocument(),
            'paid_media' => $this->getPaidMedia(),
            'photo' => $this->getPhoto(),
            'sticker' => $this->getSticker(),
            'story' => $this->getStory(),
            'video' => $this->getVideo(),
            'video_note' => $this->getVideoNote(),
            'voice' => $this->getVoice(),
            'has_media_spoiler' => $this->getHasMediaSpoiler(),
            'contact' => $this->getContact(),
            'dice' => $this->getDice(),
            'game' => $this->getGame(),
            'giveaway' => $this->getGiveaway(),
            'giveaway_winners' => $this->getGiveawayWinners(),
            'invoice' => $this->getInvoice(),
            'location' => $this->getLocation(),
            'poll' => $this->getPoll(),
            'venue' => $this->getVenue(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Origin of the message replied to by the given message 
     *
     * @var AbstractMessageOrigin
     * @SerializedName("origin")
     * @Accessor(getter="getOrigin", setter="setOrigin")
     * @Type("MadmagesTelegram\Types\Type\AbstractMessageOrigin")
     */
    protected $origin;

    /**
     * Optional. Chat the original message belongs to. Available only if the chat is a supergroup or a channel. 
     *
     * @var Chat|null
     * @SkipWhenEmpty
     * @SerializedName("chat")
     * @Accessor(getter="getChat", setter="setChat")
     * @Type("MadmagesTelegram\Types\Type\Chat")
     */
    protected $chat;

    /**
     * Optional. Unique message identifier inside the original chat. Available only if the original chat is a supergroup 
     * or a channel. 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("message_id")
     * @Accessor(getter="getMessageId", setter="setMessageId")
     * @Type("int")
     */
    protected $messageId;

    /**
     * Optional. Options used for link preview generation for the original message, if it is a text message 
     *
     * @var LinkPreviewOptions|null
     * @SkipWhenEmpty
     * @SerializedName("link_preview_options")
     * @Accessor(getter="getLinkPreviewOptions", setter="setLinkPreviewOptions")
     * @Type("MadmagesTelegram\Types\Type\LinkPreviewOptions")
     */
    protected $linkPreviewOptions;

    /**
     * Optional. Message is an animation, information about the animation 
     *
     * @var Animation|null
     * @SkipWhenEmpty
     * @SerializedName("animation")
     * @Accessor(getter="getAnimation", setter="setAnimation")
     * @Type("MadmagesTelegram\Types\Type\Animation")
     */
    protected $animation;

    /**
     * Optional. Message is an audio file, information about the file 
     *
     * @var Audio|null
     * @SkipWhenEmpty
     * @SerializedName("audio")
     * @Accessor(getter="getAudio", setter="setAudio")
     * @Type("MadmagesTelegram\Types\Type\Audio")
     */
    protected $audio;

    /**
     * Optional. Message is a general file, information about the file 
     *
     * @var Document|null
     * @SkipWhenEmpty
     * @SerializedName("document")
     * @Accessor(getter="getDocument", setter="setDocument")
     * @Type("MadmagesTelegram\Types\Type\Document")
     */
    protected $document;

    /**
     * Optional. Message contains paid media; information about the paid media 
     *
     * @var PaidMediaInfo|null
     * @SkipWhenEmpty
     * @SerializedName("paid_media")
     * @Accessor(getter="getPaidMedia", setter="setPaidMedia")
     * @Type("MadmagesTelegram\Types\Type\PaidMediaInfo")
     */
    protected $paidMedia;

    /**
     * Optional. Message is a photo, available sizes of the photo 
     *
     * @var PhotoSize[]|null
     * @SkipWhenEmpty
     * @SerializedName("photo")
     * @Accessor(getter="getPhoto", setter="setPhoto")
     * @Type("array<MadmagesTelegram\Types\Type\PhotoSize>")
     */
    protected $photo;

    /**
     * Optional. Message is a sticker, information about the sticker 
     *
     * @var Sticker|null
     * @SkipWhenEmpty
     * @SerializedName("sticker")
     * @Accessor(getter="getSticker", setter="setSticker")
     * @Type("MadmagesTelegram\Types\Type\Sticker")
     */
    protected $sticker;

    /**
     * Optional. Message is a forwarded story 
     *
     * @var Story|null
     * @SkipWhenEmpty
     * @SerializedName("story")
     * @Accessor(getter="getStory", setter="setStory")
     * @Type("MadmagesTelegram\Types\Type\Story")
     */
    protected $story;

    /**
     * Optional. Message is a video, information about the video 
     *
     * @var Video|null
     * @SkipWhenEmpty
     * @SerializedName("video")
     * @Accessor(getter="getVideo", setter="setVideo")
     * @Type("MadmagesTelegram\Types\Type\Video")
     */
    protected $video;

    /**
     * Optional. Message is a video note, information about the video message 
     *
     * @var VideoNote|null
     * @SkipWhenEmpty
     * @SerializedName("video_note")
     * @Accessor(getter="getVideoNote", setter="setVideoNote")
     * @Type("MadmagesTelegram\Types\Type\VideoNote")
     */
    protected $videoNote;

    /**
     * Optional. Message is a voice message, information about the file 
     *
     * @var Voice|null
     * @SkipWhenEmpty
     * @SerializedName("voice")
     * @Accessor(getter="getVoice", setter="setVoice")
     * @Type("MadmagesTelegram\Types\Type\Voice")
     */
    protected $voice;

    /**
     * Optional. True, if the message media is covered by a spoiler animation 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("has_media_spoiler")
     * @Accessor(getter="getHasMediaSpoiler", setter="setHasMediaSpoiler")
     * @Type("bool")
     */
    protected $hasMediaSpoiler;

    /**
     * Optional. Message is a shared contact, information about the contact 
     *
     * @var Contact|null
     * @SkipWhenEmpty
     * @SerializedName("contact")
     * @Accessor(getter="getContact", setter="setContact")
     * @Type("MadmagesTelegram\Types\Type\Contact")
     */
    protected $contact;

    /**
     * Optional. Message is a dice with random value 
     *
     * @var Dice|null
     * @SkipWhenEmpty
     * @SerializedName("dice")
     * @Accessor(getter="getDice", setter="setDice")
     * @Type("MadmagesTelegram\Types\Type\Dice")
     */
    protected $dice;

    /**
     * Optional. Message is a game, information about the game. More about games » 
     *
     * @var Game|null
     * @SkipWhenEmpty
     * @SerializedName("game")
     * @Accessor(getter="getGame", setter="setGame")
     * @Type("MadmagesTelegram\Types\Type\Game")
     */
    protected $game;

    /**
     * Optional. Message is a scheduled giveaway, information about the giveaway 
     *
     * @var Giveaway|null
     * @SkipWhenEmpty
     * @SerializedName("giveaway")
     * @Accessor(getter="getGiveaway", setter="setGiveaway")
     * @Type("MadmagesTelegram\Types\Type\Giveaway")
     */
    protected $giveaway;

    /**
     * Optional. A giveaway with public winners was completed 
     *
     * @var GiveawayWinners|null
     * @SkipWhenEmpty
     * @SerializedName("giveaway_winners")
     * @Accessor(getter="getGiveawayWinners", setter="setGiveawayWinners")
     * @Type("MadmagesTelegram\Types\Type\GiveawayWinners")
     */
    protected $giveawayWinners;

    /**
     * Optional. Message is an invoice for a payment, information about the invoice. More about payments » 
     *
     * @var Invoice|null
     * @SkipWhenEmpty
     * @SerializedName("invoice")
     * @Accessor(getter="getInvoice", setter="setInvoice")
     * @Type("MadmagesTelegram\Types\Type\Invoice")
     */
    protected $invoice;

    /**
     * Optional. Message is a shared location, information about the location 
     *
     * @var Location|null
     * @SkipWhenEmpty
     * @SerializedName("location")
     * @Accessor(getter="getLocation", setter="setLocation")
     * @Type("MadmagesTelegram\Types\Type\Location")
     */
    protected $location;

    /**
     * Optional. Message is a native poll, information about the poll 
     *
     * @var Poll|null
     * @SkipWhenEmpty
     * @SerializedName("poll")
     * @Accessor(getter="getPoll", setter="setPoll")
     * @Type("MadmagesTelegram\Types\Type\Poll")
     */
    protected $poll;

    /**
     * Optional. Message is a venue, information about the venue 
     *
     * @var Venue|null
     * @SkipWhenEmpty
     * @SerializedName("venue")
     * @Accessor(getter="getVenue", setter="setVenue")
     * @Type("MadmagesTelegram\Types\Type\Venue")
     */
    protected $venue;


    /**
     * @param AbstractMessageOrigin $origin
     * @return static
     */
    public function setOrigin(AbstractMessageOrigin $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    /**
     * @return AbstractMessageOrigin
     */
    public function getOrigin(): AbstractMessageOrigin
    {
        return $this->origin;
    }

    /**
     * @param Chat $chat
     * @return static
     */
    public function setChat(Chat $chat): self
    {
        $this->chat = $chat;

        return $this;
    }

    /**
     * @return Chat|null
     */
    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    /**
     * @param int $messageId
     * @return static
     */
    public function setMessageId(int $messageId): self
    {
        $this->messageId = $messageId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMessageId(): ?int
    {
        return $this->messageId;
    }

    /**
     * @param LinkPreviewOptions $linkPreviewOptions
     * @return static
     */
    public function setLinkPreviewOptions(LinkPreviewOptions $linkPreviewOptions): self
    {
        $this->linkPreviewOptions = $linkPreviewOptions;

        return $this;
    }

    /**
     * @return LinkPreviewOptions|null
     */
    public function getLinkPreviewOptions(): ?LinkPreviewOptions
    {
        return $this->linkPreviewOptions;
    }

    /**
     * @param Animation $animation
     * @return static
     */
    public function setAnimation(Animation $animation): self
    {
        $this->animation = $animation;

        return $this;
    }

    /**
     * @return Animation|null
     */
    public function getAnimation(): ?Animation
    {
        return $this->animation;
    }

    /**
     * @param Audio $audio
     * @return static
     */
    public function setAudio(Audio $audio): self
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * @return Audio|null
     */
    public function getAudio(): ?Audio
    {
        return $this->audio;
    }

    /**
     * @param Document $document
     * @return static
     */
    public function setDocument(Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * @param PaidMediaInfo $paidMedia
     * @return static
     */
    public function setPaidMedia(PaidMediaInfo $paidMedia): self
    {
        $this->paidMedia = $paidMedia;

        return $this;
    }

    /**
     * @return PaidMediaInfo|null
     */
    public function getPaidMedia(): ?PaidMediaInfo
    {
        return $this->paidMedia;
    }

    /**
     * @param PhotoSize[] $photo
     * @return static
     */
    public function setPhoto(array $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * @return PhotoSize[]|null
     */
    public function getPhoto(): ?array
    {
        return $this->photo;
    }

    /**
     * @param Sticker $sticker
     * @return static
     */
    public function setSticker(Sticker $sticker): self
    {
        $this->sticker = $sticker;

        return $this;
    }

    /**
     * @return Sticker|null
     */
    public function getSticker(): ?Sticker
    {
        return $this->sticker;
    }

    /**
     * @param Story $story
     * @return static
     */
    public function setStory(Story $story): self
    {
        $this->story = $story;

        return $this;
    }

    /**
     * @return Story|null
     */
    public function getStory(): ?Story
    {
        return $this->story;
    }

    /**
     * @param Video $video
     * @return static
     */
    public function setVideo(Video $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Video|null
     */
    public function getVideo(): ?Video
    {
        return $this->video;
    }

    /**
     * @param VideoNote $videoNote
     * @return static
     */
    public function setVideoNote(VideoNote $videoNote): self
    {
        $this->videoNote = $videoNote;

        return $this;
    }

    /**
     * @return VideoNote|null
     */
    public function getVideoNote(): ?VideoNote
    {
        return $this->videoNote;
    }

    /**
     * @param Voice $voice
     * @return static
     */
    public function setVoice(Voice $voice): self
    {
        $this->voice = $voice;

        return $this;
    }

    /**
     * @return Voice|null
     */
    public function getVoice(): ?Voice
    {
        return $this->voice;
    }

    /**
     * @param bool $hasMediaSpoiler
     * @return static
     */
    public function setHasMediaSpoiler(bool $hasMediaSpoiler): self
    {
        $this->hasMediaSpoiler = $hasMediaSpoiler;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHasMediaSpoiler(): ?bool
    {
        return $this->hasMediaSpoiler;
    }

    /**
     * @param Contact $contact
     * @return static
     */
    public function setContact(Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * @param Dice $dice
     * @return static
     */
    public function setDice(Dice $dice): self
    {
        $this->dice = $dice;

        return $this;
    }

    /**
     * @return Dice|null
     */
    public function getDice(): ?Dice
    {
        return $this->dice;
    }

    /**
     * @param Game $game
     * @return static
     */
    public function setGame(Game $game): self
    {
        $this->game = $game;

        return $this;
    }

    /**
     * @return Game|null
     */
    public function getGame(): ?Game
    {
        return $this->game;
    }

    /**
     * @param Giveaway $giveaway
     * @return static
     */
    public function setGiveaway(Giveaway $giveaway): self
    {
        $this->giveaway = $giveaway;

        return $this;
    }

    /**
     * @return Giveaway|null
     */
    public function getGiveaway(): ?Giveaway
    {
        return $this->giveaway;
    }

    /**
     * @param GiveawayWinners $giveawayWinners
     * @return static
     */
    public function setGiveawayWinners(GiveawayWinners $giveawayWinners): self
    {
        $this->giveawayWinners = $giveawayWinners;

        return $this;
    }

    /**
     * @return GiveawayWinners|null
     */
    public function getGiveawayWinners(): ?GiveawayWinners
    {
        return $this->giveawayWinners;
    }

    /**
     * @param Invoice $invoice
     * @return static
     */
    public function setInvoice(Invoice $invoice): self
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return Invoice|null
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Location $location
     * @return static
     */
    public function setLocation(Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Location|null
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param Poll $poll
     * @return static
     */
    public function setPoll(Poll $poll): self
    {
        $this->poll = $poll;

        return $this;
    }

    /**
     * @return Poll|null
     */
    public function getPoll(): ?Poll
    {
        return $this->poll;
    }

    /**
     * @param Venue $venue
     * @return static
     */
    public function setVenue(Venue $venue): self
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * @return Venue|null
     */
    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

}