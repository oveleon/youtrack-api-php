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
    private array $fieldCollection = [];

    /**
     * The filters to be used for the call.
     */
    private array $filterCollection = [];

    /**
     * The query parameter to be used for the route.
     */
    private array $queryCollection = [];

    /**
     * Pagination offset.
     */
    private ?int $offset = null;

    /**
     * Pagination limit.
     */
    private ?int $limit = null;

    /**
     * Abstract API.
     */
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
     * Defines a filter that is used to send the request.
     */
    public function filter(string $query): self
    {
        $this->addFilter($query);

        return $this;
    }

    /**
     * Paginate the result list.
     */
    public function paginate(int $offset, int $limit): self
    {
        $this->offset = $offset;
        $this->limit = $limit;

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
        $this->fieldCollection = array_merge_recursive(
            $this->fieldCollection,
            $fields
        );
    }

    /**
     * Adds filter to be used for the call.
     */
    protected function addFilter(string $query): void
    {
        $this->filterCollection[] = $query;
    }

    /**
     * Adds query to be used for the route.
     */
    protected function addQuery(string $name, string $value): void
    {
        $this->queryCollection[$name] = $value;
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
     * Generates a route with fields and the query.
     */
    protected function generateUri(string $uri): string
    {
        // Use default fields when no fields are set
        if(empty($this->fieldCollection))
        {
            $this->defaultFields();
        }

        $query = http_build_query([
            ...QueryUtil::queryList('fields', $this->fieldCollection),
            ...QueryUtil::queryList('query', $this->filterCollection, ' '),
            ...$this->queryCollection
        ]);

        if(null !== $this->offset && null !== $this->limit)
        {
            $query .= sprintf('&$skip=%s&$top=%s', $this->offset, $this->limit);
        }

        $this->offset = null;
        $this->limit = null;

        $this->filterCollection = [];
        $this->fieldCollection = [];

        return $uri . ($query ? '?' . $query : '');
    }
}
