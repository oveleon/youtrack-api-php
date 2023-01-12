<?php

namespace Oveleon\YouTrack\HttpClient;

interface HttpClientInterface
{
    public function get(string $uri): array;
    public function post(string $uri, array $body = []): array;
    public function put(string $uri, array $body = []): array;
    public function delete(string $uri, array $body = []): array;
}
