<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#inputinvoicemessagecontent
 *
 * Represents the content of an invoice message to be sent as the result of an 
 * inline query. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class InputInvoiceMessageContent extends AbstractInputMessageContent
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'title',
            'description',
            'payload',
            'provider_token',
            'currency',
            'prices',
            'max_tip_amount',
            'suggested_tip_amounts',
            'provider_data',
            'photo_url',
            'photo_size',
            'photo_width',
            'photo_height',
            'need_name',
            'need_phone_number',
            'need_email',
            'need_shipping_address',
            'send_phone_number_to_provider',
            'send_email_to_provider',
            'is_flexible',
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
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'payload' => $this->getPayload(),
            'provider_token' => $this->getProviderToken(),
            'currency' => $this->getCurrency(),
            'prices' => $this->getPrices(),
            'max_tip_amount' => $this->getMaxTipAmount(),
            'suggested_tip_amounts' => $this->getSuggestedTipAmounts(),
            'provider_data' => $this->getProviderData(),
            'photo_url' => $this->getPhotoUrl(),
            'photo_size' => $this->getPhotoSize(),
            'photo_width' => $this->getPhotoWidth(),
            'photo_height' => $this->getPhotoHeight(),
            'need_name' => $this->getNeedName(),
            'need_phone_number' => $this->getNeedPhoneNumber(),
            'need_email' => $this->getNeedEmail(),
            'need_shipping_address' => $this->getNeedShippingAddress(),
            'send_phone_number_to_provider' => $this->getSendPhoneNumberToProvider(),
            'send_email_to_provider' => $this->getSendEmailToProvider(),
            'is_flexible' => $this->getIsFlexible(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Product name, 1-32 characters 
     *
     * @var string
     * @SerializedName("title")
     * @Accessor(getter="getTitle",setter="setTitle")
     * @Type("string")
     */
    protected $title;

    /**
     * Product description, 1-255 characters 
     *
     * @var string
     * @SerializedName("description")
     * @Accessor(getter="getDescription",setter="setDescription")
     * @Type("string")
     */
    protected $description;

    /**
     * Bot-defined invoice payload, 1-128 bytes. This will not be displayed to the user, use for your internal processes. 
     *
     * @var string
     * @SerializedName("payload")
     * @Accessor(getter="getPayload",setter="setPayload")
     * @Type("string")
     */
    protected $payload;

    /**
     * Payment provider token, obtained via Botfather 
     *
     * @var string
     * @SerializedName("provider_token")
     * @Accessor(getter="getProviderToken",setter="setProviderToken")
     * @Type("string")
     */
    protected $providerToken;

    /**
     * Three-letter ISO 4217 currency code, see more on currencies 
     *
     * @var string
     * @SerializedName("currency")
     * @Accessor(getter="getCurrency",setter="setCurrency")
     * @Type("string")
     */
    protected $currency;

    /**
     * Price breakdown, a JSON-serialized list of components (e.g. product price, tax, discount, delivery cost, 
     * delivery tax, bonus, etc.) 
     *
     * @var LabeledPrice[]
     * @SerializedName("prices")
     * @Accessor(getter="getPrices",setter="setPrices")
     * @Type("array<MadmagesTelegram\Types\Type\LabeledPrice>")
     */
    protected $prices;

    /**
     * Optional. The maximum accepted amount for tips in the smallest units of the currency (integer, not float/double). 
     * For example, for a maximum tip of US$ 1.45 pass max_tip_amount = 145. See the exp parameter in currencies.json, it shows 
     * the number of digits past the decimal point for each currency (2 for the majority of currencies). Defaults to 0 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("max_tip_amount")
     * @Accessor(getter="getMaxTipAmount",setter="setMaxTipAmount")
     * @Type("int")
     */
    protected $maxTipAmount;

    /**
     * Optional. A JSON-serialized array of suggested amounts of tip in the smallest units of the currency (integer, not 
     * float/double). At most 4 suggested tip amounts can be specified. The suggested tip amounts must be positive, passed in a strictly 
     * increased order and must not exceed max_tip_amount. 
     *
     * @var int[]|null
     * @SkipWhenEmpty
     * @SerializedName("suggested_tip_amounts")
     * @Accessor(getter="getSuggestedTipAmounts",setter="setSuggestedTipAmounts")
     * @Type("array<int>")
     */
    protected $suggestedTipAmounts;

    /**
     * Optional. A JSON-serialized object for data about the invoice, which will be shared with the payment provider. A 
     * detailed description of the required fields should be provided by the payment provider. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("provider_data")
     * @Accessor(getter="getProviderData",setter="setProviderData")
     * @Type("string")
     */
    protected $providerData;

    /**
     * Optional. URL of the product photo for the invoice. Can be a photo of the goods or a marketing image for a service. 
     * People like it better when they see what they are paying for. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("photo_url")
     * @Accessor(getter="getPhotoUrl",setter="setPhotoUrl")
     * @Type("string")
     */
    protected $photoUrl;

    /**
     * Optional. Photo size 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("photo_size")
     * @Accessor(getter="getPhotoSize",setter="setPhotoSize")
     * @Type("int")
     */
    protected $photoSize;

    /**
     * Optional. Photo width 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("photo_width")
     * @Accessor(getter="getPhotoWidth",setter="setPhotoWidth")
     * @Type("int")
     */
    protected $photoWidth;

    /**
     * Optional. Photo height 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("photo_height")
     * @Accessor(getter="getPhotoHeight",setter="setPhotoHeight")
     * @Type("int")
     */
    protected $photoHeight;

    /**
     * Optional. Pass True, if you require the user's full name to complete the order 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("need_name")
     * @Accessor(getter="getNeedName",setter="setNeedName")
     * @Type("bool")
     */
    protected $needName;

    /**
     * Optional. Pass True, if you require the user's phone number to complete the order 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("need_phone_number")
     * @Accessor(getter="getNeedPhoneNumber",setter="setNeedPhoneNumber")
     * @Type("bool")
     */
    protected $needPhoneNumber;

    /**
     * Optional. Pass True, if you require the user's email address to complete the order 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("need_email")
     * @Accessor(getter="getNeedEmail",setter="setNeedEmail")
     * @Type("bool")
     */
    protected $needEmail;

    /**
     * Optional. Pass True, if you require the user's shipping address to complete the order 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("need_shipping_address")
     * @Accessor(getter="getNeedShippingAddress",setter="setNeedShippingAddress")
     * @Type("bool")
     */
    protected $needShippingAddress;

    /**
     * Optional. Pass True, if user's phone number should be sent to provider 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("send_phone_number_to_provider")
     * @Accessor(getter="getSendPhoneNumberToProvider",setter="setSendPhoneNumberToProvider")
     * @Type("bool")
     */
    protected $sendPhoneNumberToProvider;

    /**
     * Optional. Pass True, if user's email address should be sent to provider 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("send_email_to_provider")
     * @Accessor(getter="getSendEmailToProvider",setter="setSendEmailToProvider")
     * @Type("bool")
     */
    protected $sendEmailToProvider;

    /**
     * Optional. Pass True, if the final price depends on the shipping method 
     *
     * @var bool|null
     * @SkipWhenEmpty
     * @SerializedName("is_flexible")
     * @Accessor(getter="getIsFlexible",setter="setIsFlexible")
     * @Type("bool")
     */
    protected $isFlexible;


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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $payload
     * @return static
     */
    public function setPayload(string $payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayload(): string
    {
        return $this->payload;
    }

    /**
     * @param string $providerToken
     * @return static
     */
    public function setProviderToken(string $providerToken): self
    {
        $this->providerToken = $providerToken;

        return $this;
    }

    /**
     * @return string
     */
    public function getProviderToken(): string
    {
        return $this->providerToken;
    }

    /**
     * @param string $currency
     * @return static
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param LabeledPrice[] $prices
     * @return static
     */
    public function setPrices(array $prices): self
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @return LabeledPrice[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param int $maxTipAmount
     * @return static
     */
    public function setMaxTipAmount(int $maxTipAmount): self
    {
        $this->maxTipAmount = $maxTipAmount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxTipAmount(): ?int
    {
        return $this->maxTipAmount;
    }

    /**
     * @param int[] $suggestedTipAmounts
     * @return static
     */
    public function setSuggestedTipAmounts(array $suggestedTipAmounts): self
    {
        $this->suggestedTipAmounts = $suggestedTipAmounts;

        return $this;
    }

    /**
     * @return int[]|null
     */
    public function getSuggestedTipAmounts(): ?array
    {
        return $this->suggestedTipAmounts;
    }

    /**
     * @param string $providerData
     * @return static
     */
    public function setProviderData(string $providerData): self
    {
        $this->providerData = $providerData;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getProviderData(): ?string
    {
        return $this->providerData;
    }

    /**
     * @param string $photoUrl
     * @return static
     */
    public function setPhotoUrl(string $photoUrl): self
    {
        $this->photoUrl = $photoUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhotoUrl(): ?string
    {
        return $this->photoUrl;
    }

    /**
     * @param int $photoSize
     * @return static
     */
    public function setPhotoSize(int $photoSize): self
    {
        $this->photoSize = $photoSize;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoSize(): ?int
    {
        return $this->photoSize;
    }

    /**
     * @param int $photoWidth
     * @return static
     */
    public function setPhotoWidth(int $photoWidth): self
    {
        $this->photoWidth = $photoWidth;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoWidth(): ?int
    {
        return $this->photoWidth;
    }

    /**
     * @param int $photoHeight
     * @return static
     */
    public function setPhotoHeight(int $photoHeight): self
    {
        $this->photoHeight = $photoHeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPhotoHeight(): ?int
    {
        return $this->photoHeight;
    }

    /**
     * @param bool $needName
     * @return static
     */
    public function setNeedName(bool $needName): self
    {
        $this->needName = $needName;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedName(): ?bool
    {
        return $this->needName;
    }

    /**
     * @param bool $needPhoneNumber
     * @return static
     */
    public function setNeedPhoneNumber(bool $needPhoneNumber): self
    {
        $this->needPhoneNumber = $needPhoneNumber;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedPhoneNumber(): ?bool
    {
        return $this->needPhoneNumber;
    }

    /**
     * @param bool $needEmail
     * @return static
     */
    public function setNeedEmail(bool $needEmail): self
    {
        $this->needEmail = $needEmail;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedEmail(): ?bool
    {
        return $this->needEmail;
    }

    /**
     * @param bool $needShippingAddress
     * @return static
     */
    public function setNeedShippingAddress(bool $needShippingAddress): self
    {
        $this->needShippingAddress = $needShippingAddress;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNeedShippingAddress(): ?bool
    {
        return $this->needShippingAddress;
    }

    /**
     * @param bool $sendPhoneNumberToProvider
     * @return static
     */
    public function setSendPhoneNumberToProvider(bool $sendPhoneNumberToProvider): self
    {
        $this->sendPhoneNumberToProvider = $sendPhoneNumberToProvider;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSendPhoneNumberToProvider(): ?bool
    {
        return $this->sendPhoneNumberToProvider;
    }

    /**
     * @param bool $sendEmailToProvider
     * @return static
     */
    public function setSendEmailToProvider(bool $sendEmailToProvider): self
    {
        $this->sendEmailToProvider = $sendEmailToProvider;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSendEmailToProvider(): ?bool
    {
        return $this->sendEmailToProvider;
    }

    /**
     * @param bool $isFlexible
     * @return static
     */
    public function setIsFlexible(bool $isFlexible): self
    {
        $this->isFlexible = $isFlexible;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsFlexible(): ?bool
    {
        return $this->isFlexible;
    }

}