<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#passportdata
 *
 * Contains information about Telegram Passport data shared with the bot by the user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class PassportData extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'data',
            'credentials',
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
            'data' => $this->getData(),
            'credentials' => $this->getCredentials(),
        ];

        $result = array_filter($result, static function($item){ return $item!==null; });
        return array_map(static function(&$item){
            return is_object($item) ? $item->_getRawData():$item;
        }, $result);
    }

    /**
     * Array with information about documents and other Telegram Passport elements that was shared with the bot
     *
     * @var EncryptedPassportElement[]
     * @SerializedName("data")
     * @Accessor(getter="getData",setter="setData")
     * @Type("array<MadmagesTelegram\Types\Type\EncryptedPassportElement>")
     */
    protected $data;

    /**
     * Encrypted credentials required to decrypt the data
     *
     * @var EncryptedCredentials
     * @SerializedName("credentials")
     * @Accessor(getter="getCredentials",setter="setCredentials")
     * @Type("MadmagesTelegram\Types\Type\EncryptedCredentials")
     */
    protected $credentials;


    /**
     * @param EncryptedPassportElement[] $data
     * @return static
     */
    public function setData(array $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return EncryptedPassportElement[]
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param EncryptedCredentials $credentials
     * @return static
     */
    public function setCredentials(EncryptedCredentials $credentials): self
    {
        $this->credentials = $credentials;

        return $this;
    }

    /**
     * @return EncryptedCredentials
     */
    public function getCredentials(): EncryptedCredentials
    {
        return $this->credentials;
    }

}