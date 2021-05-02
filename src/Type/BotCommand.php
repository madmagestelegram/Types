<?php declare(strict_types=1);

namespace MadmagesTelegram\Types\Type;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SkipWhenEmpty;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Accessor;
use JMS\Serializer\Annotation\Type;

/**
 * https://core.telegram.org/bots/api#botcommand
 *
 * This object represents a bot command. 
 *
 * @ExclusionPolicy("none")
 * @AccessType("public_method")
 */
class BotCommand extends AbstractType
{

    /**
     * Returns raw names of properties of this type
     *
     * @return string[]
     */
    public static function _getPropertyNames(): array
    {
        return [
            'command',
            'description',
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
            'command' => $this->getCommand(),
            'description' => $this->getDescription(),
        ];

        return parent::normalizeData($result);
    }

    /**
     * Text of the command, 1-32 characters. Can contain only lowercase English letters, digits and underscores. 
     *
     * @var string
     * @SerializedName("command")
     * @Accessor(getter="getCommand",setter="setCommand")
     * @Type("string")
     */
    protected $command;

    /**
     * Description of the command, 3-256 characters. 
     *
     * @var string
     * @SerializedName("description")
     * @Accessor(getter="getDescription",setter="setDescription")
     * @Type("string")
     */
    protected $description;


    /**
     * @param string $command
     * @return static
     */
    public function setCommand(string $command): self
    {
        $this->command = $command;

        return $this;
    }

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
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

}