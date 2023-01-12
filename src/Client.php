<?php

namespace Oveleon\YouTrack;

use Oveleon\YouTrack\Api\AbstractApi;
use Oveleon\YouTrack\Api\Issue;
use Oveleon\YouTrack\Api\Project;
use Oveleon\YouTrack\Exception\BadScopeCallException;
use Oveleon\YouTrack\Exception\InvalidScopeException;
use Oveleon\YouTrack\HttpClient\HttpClientInterface;

/**
 * @method issues
 * @method projects
 */
class Client
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getHttpClient(): HttpClientInterface
    {
        return $this->httpClient;
    }

    public function api(string $scope): AbstractApi
    {
        return match ($scope) {
            'projects'  => new Project($this),
            'issues'    => new Issue($this),
            default     => throw new InvalidScopeException(sprintf('Undefined api scope called: "%s"', $scope)),
        };
    }

    public function __call(string $name, array $arguments)
    {
        try {
            return $this->api($name);
        }
        catch (InvalidScopeException $e)
        {
            throw new BadScopeCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }
}
