<?php

namespace Oveleon\YouTrack\Api;

use Oveleon\YouTrack\Api\Issue\Comment;

class Issue extends AbstractApi
{
    /**
     * Overwrites the default fields for issues.
     */
    protected function defaultFields(): self
    {
        $this->addFields([
            'id',
            'idReadable',
            'summary',
            'description',
            'state',
            /*'customFields' => [
                'name',
                '$type',
                'value' => [
                    'name',
                    'login',
                ],
            ],*/
            'project(name)'
        ]);

        return $this;
    }

    /**
     * Find all issues.
     */
    public function findAll(): array
    {
        return $this->get("issues");
    }

    /**
     * Find all issues by a project id.
     */
    public function findByProject($projectId): array
    {
        $this->addQuery("project:{$projectId}");

        return $this->get("issues");
    }

    /**
     * Creates a new issue.
     */
    public function create(): array
    {
        // ToDo: https://www.jetbrains.com/help/youtrack/devportal/api-howto-create-issue.html#step-by-step
    }

    /**
     * Update an existing issue.
     */
    public function update(): array
    {
        // ToDo: https://www.jetbrains.com/help/youtrack/devportal/api-howto-create-issue.html#step-by-step
    }

    /**
     * Returns the issue comments instance.
     */
    public function comments(): Comment
    {
        return new Comment($this->getClient());
    }
}
