<?php

namespace Oveleon\YouTrack\Api;

use Oveleon\YouTrack\Client;
use Oveleon\YouTrack\Util\QueryUtil;

abstract class AbstractApi
{
    /**
     * The client instance.
     */
    private Client $client;

    /**
     * The fields to be retrieved.
     */
    protected array $fieldCollection = [];

    /**
     * The queries to be used for the call.
     */
    protected array $queryCollection = [];


    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * This method allows to set own return fields.
     */
    public function fields(array $fields): self
    {
        $this->addFields($fields);

        return $this;
    }

    /**
     * Defines a query that is used to send the request.
     */
    public function query(string $query): self
    {
        $this->addQuery($query);

        return $this;
    }

    /**
     * Method to use default fields.
     * This method is overridden by most subclasses to always deliver default fields for the actual purpose.
     */
    protected function defaultFields(): self
    {
        $this->addFields(['id', '$type']);

        return $this;
    }

    /**
     * Adds fields to be retrieved.
     */
    protected function addFields(array $fields): void
    {
        $this->fieldCollection = array_merge(
            $this->fieldCollection,
            $fields
        );
    }

    /**
     * Adds query to be used.
     */
    protected function addQuery(string $query): void
    {
        $this->queryCollection[] = $query;
    }

    /**
     * Returns the Client.
     */
    protected function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Send a GET request.
     */
    protected function get(string $uri): array
    {
        return $this->client->getHttpClient()->get($this->generateUri($uri));
    }

    /**
     * Send a POST request.
     */
    protected function post(string $uri, array $body = []): array
    {
        return $this->client->getHttpClient()->post($this->generateUri($uri), $body);
    }

    /**
     * Send a PUT request.
     */
    protected function put(string $uri, array $body = []): array
    {
        return $this->client->getHttpClient()->put($this->generateUri($uri), $body);
    }

    /**
     * Send a DELETE request.
     */
    protected function delete(string $uri, array $body = []): array
    {
        return $this->client->getHttpClient()->delete($this->generateUri($uri), $body);
    }

    /**
     * Generates a route with fields and the query
     */
    protected function generateUri($uri): string
    {
        // Use default fields when no fields are set
        if(empty($this->fieldCollection))
        {
            $this->defaultFields();
        }

        $query = http_build_query([
            ...QueryUtil::queryList('fields', $this->fieldCollection),
            ...QueryUtil::queryList('query', $this->queryCollection)
        ]);

        // ToDo: Reset query and fields

        return $uri . '?' . $query;
    }
}
