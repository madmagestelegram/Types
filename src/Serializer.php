<?php declare(strict_types = 1);

namespace MadmagesTelegram\Types;

use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use MadmagesTelegram\Types\Type\AbstractChatMember;
use MadmagesTelegram\Types\Type\AbstractMaybeInaccessibleMessage;
use MadmagesTelegram\Types\Type\InaccessibleMessage;
use MadmagesTelegram\Types\Type\Message;
use MadmagesTelegram\Types\Type\ChatMemberAdministrator;
use MadmagesTelegram\Types\Type\ChatMemberBanned;
use MadmagesTelegram\Types\Type\ChatMemberLeft;
use MadmagesTelegram\Types\Type\ChatMemberMember;
use MadmagesTelegram\Types\Type\ChatMemberOwner;
use MadmagesTelegram\Types\Type\ChatMemberRestricted;

class Serializer
{

    private static ?SerializerInterface $serializer = null;

    public static function deserialize(string $jsonString, string $type)
    {
        return self::getSerializer()->deserialize($jsonString, $type, 'json');
    }

    public static function getSerializer(): SerializerInterface
    {
        if (self::$serializer === null) {
            $serializerBuilder = SerializerBuilder::create();
            $serializerBuilder->configureListeners(function (\JMS\Serializer\EventDispatcher\EventDispatcher $dispatcher
            ) {
                $dispatcher->addListener('serializer.pre_deserialize',
                    function (\JMS\Serializer\EventDispatcher\PreDeserializeEvent $event) {
                        if ($event->getType()['name'] === AbstractChatMember::class) {
                            $type = match ($status = $event->getData()['status']) {
                                'creator' => ChatMemberOwner::class,
                                'administrator' => ChatMemberAdministrator::class,
                                'member' => ChatMemberMember::class,
                                'restricted' => ChatMemberRestricted::class,
                                'left' => ChatMemberLeft::class,
                                'kicked' => ChatMemberBanned::class,
                                default=>throw new \RuntimeException('Unexpected ChatMember status: '.$status)
                            };
                            $event->setType($type);
                        }

                        if ($event->getType()['name'] === AbstractMaybeInaccessibleMessage::class) {
                            $type = match ($event->getData()['date']) {
                                0 => InaccessibleMessage::class,
                                default => Message::class,
                            };
                            $event->setType($type);
                        }
                    }
                );
            });

            self::$serializer = $serializerBuilder->build();
        }

        return self::$serializer;
    }

    public static function serialize(object $objectToSerialize): string
    {
        return self::getSerializer()->serialize($objectToSerialize, 'json');
    }
}