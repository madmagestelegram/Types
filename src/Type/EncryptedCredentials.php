<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#encryptedcredentials
 *
 * Contains data required for decrypting and authenticating EncryptedPassportElement. See the Telegram Passport 
 * Documentation for a complete description of the data decryption and authentication processes. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class EncryptedCredentials extends AbstractType
{
    /**
     * Base64-encoded encrypted JSON-serialized data with unique user&#039;s payload, data hashes and secrets required for EncryptedPassportElement decryption and authentication
     *
     * @var string
     * @SerializedName("data")
     * @Accessor(getter="getData",setter="setdata")
     * @Type("string")
     */
    protected $data;

    /**
     * Base64-encoded data hash for data authentication
     *
     * @var string
     * @SerializedName("hash")
     * @Accessor(getter="getHash",setter="sethash")
     * @Type("string")
     */
    protected $hash;

    /**
     * Base64-encoded secret, encrypted with the bot&#039;s public RSA key, required for data decryption
     *
     * @var string
     * @SerializedName("secret")
     * @Accessor(getter="getSecret",setter="setsecret")
     * @Type("string")
     */
    protected $secret;


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
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
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

    /**
     * @param string $secret
     * @return static
     */
    public function setSecret(string $secret): self
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

}