<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#proximityalerttriggered
 *
 * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert 
 * set by another user. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class ProximityAlertTriggered extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'traveler',
            'watcher',
            'distance',
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
            'traveler' => $this->getTraveler(),
            'watcher' => $this->getWatcher(),
            'distance' => $this->getDistance(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * User that triggered the alert 
     *
     * @var User
     * @SerializedName("traveler")
     * @Accessor(getter="getTraveler",setter="setTraveler")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $traveler;

    /**
     * User that set the alert 
     *
     * @var User
     * @SerializedName("watcher")
     * @Accessor(getter="getWatcher",setter="setWatcher")
     * @Type("MadmagesTelegram\Types\Type\User")
     */
    protected $watcher;

    /**
     * The distance between the users 
     *
     * @var int
     * @SerializedName("distance")
     * @Accessor(getter="getDistance",setter="setDistance")
     * @Type("int")
     */
    protected $distance;


    /**
     * @param User $traveler
     * @return static
     */
    public function setTraveler(User $traveler): self
    {
        $this->traveler = $traveler;

        return $this;
    }

    /**
     * @return User
     */
    public function getTraveler(): User
    {
        return $this->traveler;
    }

    /**
     * @param User $watcher
     * @return static
     */
    public function setWatcher(User $watcher): self
    {
        $this->watcher = $watcher;

        return $this;
    }

    /**
     * @return User
     */
    public function getWatcher(): User
    {
        return $this->watcher;
    }

    /**
     * @param int $distance
     * @return static
     */
    public function setDistance(int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

}