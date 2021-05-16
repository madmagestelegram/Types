<?php

namespace Tests\Clients;

use Tests\BaseTestCase;

class ClientTest extends BaseTestCase
{
    /**
     * @dataProvider clientDataProvider
     */
    public function testClient(array $sampleData): void
    {
        $client = new TestClient();
        $data = $client->sendMessage(1, 'test');
        self::assertSame($sampleData, self::clearNullFields($data));
    }

    public function testTypedClient(): void
    {
        $message = (new TestTypesClient())->sendMessage(1, 'test');
        self::assertSame(TestTypesClient::SAMPLE_DATA, self::clearNullFields($message->_getData()));
    }

    public function clientDataProvider(): array
    {
        return [
            [
                [
                    'sendMessage',
                    [
                        'chat_id' => 1,
                        'text' => 'test',
                    ],
                ],
            ],
        ];
    }
}