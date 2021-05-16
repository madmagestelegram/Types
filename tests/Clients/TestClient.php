<?php

namespace Tests\Clients;

use MadmagesTelegram\Types\Client;

class TestClient extends Client
{
    public function _apiCall(string $method, array $parameters)
    {
        return [$method, $parameters];
    }
}