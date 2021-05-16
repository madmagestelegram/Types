<?php

namespace Tests\Clients;

use MadmagesTelegram\Types\TypedClient;

class TestTypesClient extends TypedClient
{

    public const SAMPLE_DATA = [
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
    ];

    public function _apiCall(string $method, array $parameters): string
    {
        return json_encode(self::SAMPLE_DATA, JSON_THROW_ON_ERROR);
    }
}