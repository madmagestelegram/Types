<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#encryptedpassportelement
 *
 * Describes documents or other Telegram Passport elements shared with the bot by the user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class EncryptedPassportElement extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'type',
            'data',
            'phone_number',
            'email',
            'files',
            'front_side',
            'reverse_side',
            'selfie',
            'translation',
            'hash',
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
            'type' => $this->getType(),
            'data' => $this->getData(),
            'phone_number' => $this->getPhoneNumber(),
            'email' => $this->getEmail(),
            'files' => $this->getFiles(),
            'front_side' => $this->getFrontSide(),
            'reverse_side' => $this->getReverseSide(),
            'selfie' => $this->getSelfie(),
            'translation' => $this->getTranslation(),
            'hash' => $this->getHash(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Element type. One of “personal_details”, “passport”, “driver_license”, “identity_card”, 
     * “internal_passport”, “address”, “utility_bill”, “bank_statement”, “rental_agreement”, 
     * “passport_registration”, “temporary_registration”, “phone_number”, “email”. 
     *
     * @var string
     * @SerializedName("type")
     * @Accessor(getter="getType", setter="setType")
     * @Type("string")
     */
    protected $type;

    /**
     * Optional. Base64-encoded encrypted Telegram Passport element data provided by the user; available only for 
     * “personal_details”, “passport”, “driver_license”, “identity_card”, “internal_passport” and “address” 
     * types. Can be decrypted and verified using the accompanying EncryptedCredentials. 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("data")
     * @Accessor(getter="getData", setter="setData")
     * @Type("string")
     */
    protected $data;

    /**
     * Optional. User's verified phone number; available only for “phone_number” type 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("phone_number")
     * @Accessor(getter="getPhoneNumber", setter="setPhoneNumber")
     * @Type("string")
     */
    protected $phoneNumber;

    /**
     * Optional. User's verified email address; available only for “email” type 
     *
     * @var string|null
     * @SkipWhenEmpty
     * @SerializedName("email")
     * @Accessor(getter="getEmail", setter="setEmail")
     * @Type("string")
     */
    protected $email;

    /**
     * Optional. Array of encrypted files with documents provided by the user; available only for “utility_bill”, 
     * “bank_statement”, “rental_agreement”, “passport_registration” and “temporary_registration” types. Files can be 
     * decrypted and verified using the accompanying EncryptedCredentials. 
     *
     * @var PassportFile[]|null
     * @SkipWhenEmpty
     * @SerializedName("files")
     * @Accessor(getter="getFiles", setter="setFiles")
     * @Type("array<MadmagesTelegram\Types\Type\PassportFile>")
     */
    protected $files;

    /**
     * Optional. Encrypted file with the front side of the document, provided by the user; available only for 
     * “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be decrypted and 
     * verified using the accompanying EncryptedCredentials. 
     *
     * @var PassportFile|null
     * @SkipWhenEmpty
     * @SerializedName("front_side")
     * @Accessor(getter="getFrontSide", setter="setFrontSide")
     * @Type("MadmagesTelegram\Types\Type\PassportFile")
     */
    protected $frontSide;

    /**
     * Optional. Encrypted file with the reverse side of the document, provided by the user; available only for 
     * “driver_license” and “identity_card”. The file can be decrypted and verified using the accompanying EncryptedCredentials. 
     *
     * @var PassportFile|null
     * @SkipWhenEmpty
     * @SerializedName("reverse_side")
     * @Accessor(getter="getReverseSide", setter="setReverseSide")
     * @Type("MadmagesTelegram\Types\Type\PassportFile")
     */
    protected $reverseSide;

    /**
     * Optional. Encrypted file with the selfie of the user holding a document, provided by the user; available if 
     * requested for “passport”, “driver_license”, “identity_card” and “internal_passport”. The file can be 
     * decrypted and verified using the accompanying EncryptedCredentials. 
     *
     * @var PassportFile|null
     * @SkipWhenEmpty
     * @SerializedName("selfie")
     * @Accessor(getter="getSelfie", setter="setSelfie")
     * @Type("MadmagesTelegram\Types\Type\PassportFile")
     */
    protected $selfie;

    /**
     * Optional. Array of encrypted files with translated versions of documents provided by the user; available if 
     * requested for “passport”, “driver_license”, “identity_card”, “internal_passport”, 
     * “utility_bill”, “bank_statement”, “rental_agreement”, “passport_registration” and 
     * “temporary_registration” types. Files can be decrypted and verified using the accompanying EncryptedCredentials. 
     *
     * @var PassportFile[]|null
     * @SkipWhenEmpty
     * @SerializedName("translation")
     * @Accessor(getter="getTranslation", setter="setTranslation")
     * @Type("array<MadmagesTelegram\Types\Type\PassportFile>")
     */
    protected $translation;

    /**
     * Base64-encoded element hash for using in PassportElementErrorUnspecified 
     *
     * @var string
     * @SerializedName("hash")
     * @Accessor(getter="getHash", setter="setHash")
     * @Type("string")
     */
    protected $hash;


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
     * @param string $data
     * @return static
     */
    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string $phoneNumber
     * @return static
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $email
     * @return static
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param PassportFile[] $files
     * @return static
     */
    public function setFiles(array $files): self
    {
        $this->files = $files;

        return $this;
    }

    /**
     * @return PassportFile[]|null
     */
    public function getFiles(): ?array
    {
        return $this->files;
    }

    /**
     * @param PassportFile $frontSide
     * @return static
     */
    public function setFrontSide(PassportFile $frontSide): self
    {
        $this->frontSide = $frontSide;

        return $this;
    }

    /**
     * @return PassportFile|null
     */
    public function getFrontSide(): ?PassportFile
    {
        return $this->frontSide;
    }

    /**
     * @param PassportFile $reverseSide
     * @return static
     */
    public function setReverseSide(PassportFile $reverseSide): self
    {
        $this->reverseSide = $reverseSide;

        return $this;
    }

    /**
     * @return PassportFile|null
     */
    public function getReverseSide(): ?PassportFile
    {
        return $this->reverseSide;
    }

    /**
     * @param PassportFile $selfie
     * @return static
     */
    public function setSelfie(PassportFile $selfie): self
    {
        $this->selfie = $selfie;

        return $this;
    }

    /**
     * @return PassportFile|null
     */
    public function getSelfie(): ?PassportFile
    {
        return $this->selfie;
    }

    /**
     * @param PassportFile[] $translation
     * @return static
     */
    public function setTranslation(array $translation): self
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * @return PassportFile[]|null
     */
    public function getTranslation(): ?array
    {
        return $this->translation;
    }

    /**
     * @param string $hash
     * @return static
     */
    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

}