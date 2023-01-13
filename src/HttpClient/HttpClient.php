<?php

namespace Oveleon\YouTrack\HttpClient;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpClient\HttpClient as SymfonyHttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface as SymfonyHttpClientInterface;

final class HttpClient implements HttpClientInterface
{
    private SymfonyHttpClientInterface $client;
    private string $endpoint;
    private string $token;
    private string $prefix;

    public function __construct(string $url, string $token)
    {
        $this->client = SymfonyHttpClient::create();
        $this->endpoint = rtrim($url, '/');
        $this->token = $token;
        $this->prefix = '/api';
    }

    /**
     * Send a request.
     *
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function request(string $method, string $uri, array $body = []): array
    {
        $response = $this->client->request(
            $method,
            $this->generateRoute($uri),
            [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => "Bearer $this->token",
                    'Cache-Control' => 'no-cache'
                ],
                'json'   => $body
            ]
        );

        return $response->toArray();
    }

    /**
     * Send a GET request.
     *
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function get(string $uri): array
    {
        return $this->request(Request::METHOD_GET, $uri);
    }

    /**
     * Send a POST request.
     *
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function post(string $uri, array $body = []): array
    {
        return $this->request(Request::METHOD_POST, $uri, $body);
    }

    /**
     * Send a PUT request.
     *
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function put(string $uri, array $body = []): array
    {
        return $this->request(Request::METHOD_PUT, $uri, $body);
    }

    /**
     * Send a DELETE request.
     *
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function delete(string $uri, array $body = []): array
    {
        return $this->request(Request::METHOD_DELETE, $uri, $body);
    }

    /**
     * Generates the full route.
     */
    private function generateRoute($uri): string
    {
        return $this->endpoint . $this->prefix . '/' . $uri;
    }
}
