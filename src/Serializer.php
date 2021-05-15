<?php declare(strict_types=1);

namespace MadmagesTelegram\Types;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

class Serializer
{

    private static SerializerInterface $serializer;

    public static function deserialize(string $jsonString, string $type)
    {
        return self::getSerializer()->deserialize($jsonString, $type, 'json');
    }

    private static function getSerializer(): SerializerInterface
    {
        if (self::$serializer === null) {
            if (!class_exists(AnnotationRegistry::class, false)) {
                AnnotationRegistry::registerLoader('class_exists');
            }

            self::$serializer = SerializerBuilder::create()->build();
        }

        return self::$serializer;
    }

    public static function serialize(object $objectToSerialize): string
    {
        return self::getSerializer()->serialize($objectToSerialize, 'json');
    }
}