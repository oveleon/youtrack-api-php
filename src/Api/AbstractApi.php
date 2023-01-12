<?php

namespace Oveleon\YouTrack\Api;

use Oveleon\YouTrack\Client;

abstract class AbstractApi
{
    /**
     * The client instance.
     */
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function getClient(): Client
    {
        return $this->client;
    }

    protected function get(string $uri): array
    {
        return $this->client->getHttpClient()->get($uri);
    }

    protected function post(string $uri, array $parameter = []): array
    {
        return $this->client->getHttpClient()->post($uri, $parameter);
    }

    protected function put(string $uri, array $parameter = []): array
    {
        return $this->client->getHttpClient()->put($uri, $parameter);
    }

    protected function delete(string $uri, array $parameter = []): array
    {
        return $this->client->getHttpClient()->delete($uri, $parameter);
    }
}
