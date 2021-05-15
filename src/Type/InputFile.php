<?php declare( strict_types=1 );

namespace MadmagesTelegram\Types\Type;

class InputFile
{

    /** @var resource|string */
    private $file;

    /**
     * @param resource|string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * @return resource|string
     */
    public function getFile()
    {
        return $this->file;
    }
}