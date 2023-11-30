<?php

namespace Oveleon\YouTrack;

use Oveleon\YouTrack\Api\Issue;
use Oveleon\YouTrack\Api\Project;
use Oveleon\YouTrack\Api\User;
use Oveleon\YouTrack\Api\WorkItem;
use Oveleon\YouTrack\HttpClient\HttpClientInterface;

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

    /**
     * Entry point for issues
     */
    public function issues(): Issue
    {
        return new Issue($this);
    }

    /**
     * Entry point for projects
     */
    public function projects(): Project
    {
        return new Project($this);
    }

    public function users(): User
    {
        return new User($this);
    }

    public function workItems(): WorkItem
    {
        return new WorkItem($this);
    }
}
