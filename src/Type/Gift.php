<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#gift
 *
 * This object represents a gift that can be sent by the bot. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class Gift extends AbstractType
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
            'sticker',
            'star_count',
            'upgrade_star_count',
            'total_count',
            'remaining_count',
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
            'id' => $this->getId(),
            'sticker' => $this->getSticker(),
            'star_count' => $this->getStarCount(),
            'upgrade_star_count' => $this->getUpgradeStarCount(),
            'total_count' => $this->getTotalCount(),
            'remaining_count' => $this->getRemainingCount(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Unique identifier of the gift 
     *
     * @var string
     * @SerializedName("id")
     * @Accessor(getter="getId", setter="setId")
     * @Type("string")
     */
    protected $id;

    /**
     * The sticker that represents the gift 
     *
     * @var Sticker
     * @SerializedName("sticker")
     * @Accessor(getter="getSticker", setter="setSticker")
     * @Type("MadmagesTelegram\Types\Type\Sticker")
     */
    protected $sticker;

    /**
     * The number of Telegram Stars that must be paid to send the sticker 
     *
     * @var int
     * @SerializedName("star_count")
     * @Accessor(getter="getStarCount", setter="setStarCount")
     * @Type("int")
     */
    protected $starCount;

    /**
     * Optional. The number of Telegram Stars that must be paid to upgrade the gift to a unique one 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("upgrade_star_count")
     * @Accessor(getter="getUpgradeStarCount", setter="setUpgradeStarCount")
     * @Type("int")
     */
    protected $upgradeStarCount;

    /**
     * Optional. The total number of the gifts of this type that can be sent; for limited gifts only 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("total_count")
     * @Accessor(getter="getTotalCount", setter="setTotalCount")
     * @Type("int")
     */
    protected $totalCount;

    /**
     * Optional. The number of remaining gifts of this type that can be sent; for limited gifts only 
     *
     * @var int|null
     * @SkipWhenEmpty
     * @SerializedName("remaining_count")
     * @Accessor(getter="getRemainingCount", setter="setRemainingCount")
     * @Type("int")
     */
    protected $remainingCount;


    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * @return Sticker
     */
    public function getSticker(): Sticker
    {
        return $this->sticker;
    }

    /**
     * @param int $starCount
     * @return static
     */
    public function setStarCount(int $starCount): self
    {
        $this->starCount = $starCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getStarCount(): int
    {
        return $this->starCount;
    }

    /**
     * @param int $upgradeStarCount
     * @return static
     */
    public function setUpgradeStarCount(int $upgradeStarCount): self
    {
        $this->upgradeStarCount = $upgradeStarCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getUpgradeStarCount(): ?int
    {
        return $this->upgradeStarCount;
    }

    /**
     * @param int $totalCount
     * @return static
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param int $remainingCount
     * @return static
     */
    public function setRemainingCount(int $remainingCount): self
    {
        $this->remainingCount = $remainingCount;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getRemainingCount(): ?int
    {
        return $this->remainingCount;
    }

}