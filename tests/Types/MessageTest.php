<?php

namespace Tests\Types;

use MadmagesTelegram\Types\Serializer;
use MadmagesTelegram\Types\Type\Message;
use Tests\BaseTestCase;

class MessageTest extends BaseTestCase
{
    /**
     * @dataProvider messageDataProvider
     */
    public function testSerializeMessage(array $sampleMessage): void
    {
        /** @var Message $message */
        $message = Serializer::deserialize(json_encode($sampleMessage, JSON_THROW_ON_ERROR), Message::class);

        $messageData = self::clearNullFields($message->_getData());

        self::assertSame($sampleMessage, $messageData);
        self::assertSame($message->getFrom()->getUsername(), 'test');
    }

    public function messageDataProvider(): array
    {
        return [
            [
                [
                    'message_id' => 1,
                    'from' =>
                        [
                            'id' => 1,
                            'is_bot' => true,
                            'first_name' => 'test',
                            'username' => 'test',
                        ],
                    'date' => 1,
                    'chat' =>
                        [
                            'id' => 1,
                            'type' => 'private',
                            'username' => 'test',
                            'first_name' => 'test',
                        ],
                    'text' => 'test',
                ],
            ],
        ];
    }
}