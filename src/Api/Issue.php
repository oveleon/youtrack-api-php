<?php

namespace Oveleon\YouTrack\Api;

use Oveleon\YouTrack\Api\Issue\Comment;
use Oveleon\YouTrack\Api\Issue\Tag;
use Oveleon\YouTrack\Api\Issue\TimeTracking;

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
            'customFields' => [
                'name',
                '$type',
                'value' => [
                    'name'
                ],
            ],
            'project' => [
                'name'
            ]
        ]);

        return $this;
    }

    /**
     * Returns all issues.
     */
    public function all(): array
    {
        return $this->get("issues");
    }

    /**
     * Returns one issue by id.
     */
    public function one(string $issueId): array
    {
        return $this->get("issues/$issueId");
    }

    /**
     * Count issues.
     */
    /*public function count(): array
    {
        $this->addFields([
            'count'
        ]);

        return $this->post("issuesGetter/count");
    }*/

    /**
     * Count unresolved issues.
     */
    /*public function countUnresolved(): array
    {
        $this->addQuery('unresolvedOnly', 'true');

        return $this->count();
    }*/

    /**
     * Returns all issues by a project id.
     */
    public function project(string $projectId): array
    {
        $this->addFilter("project:{$projectId}");

        return $this->get("issues");
    }

    /**
     * Returns all issue custom fields.
     */
    public function customFields(string $issueId): array
    {
        $this->addFields([
            '$type',
            'id',
            'name',
            'value'
        ]);

        return $this->get("issues/$issueId/customFields");
    }

    /**
     * Returns all attachments.
     */
    public function attachments($issueId): array
    {
        $this->addFields([
            'name',
            'size',
            'mimeType',
            'extension',
            'charset',
            'url'
        ]);

        return $this->get("issues/$issueId/attachments");
    }

    /**
     * Creates a new issue.
     */
    public function create(array $parameter): array
    {
        return $this->post("issues", $parameter);
    }

    /**
     * Update an existing issue.
     */
    public function update(): array
    {
        // ToDo: https://www.jetbrains.com/help/youtrack/devportal/api-usecase-update-text-field-value.html
    }

    /**
     * Returns the issue comments instance.
     */
    public function comments(): Comment
    {
        return new Comment($this->getClient());
    }

    /**
     * Returns the issue tags instance.
     */
    public function tags(): Tag
    {
        return new Tag($this->getClient());
    }

    /**
     * Returns the issue time tracking instance.
     */
    public function timeTracking(): TimeTracking
    {
        return new TimeTracking($this->getClient());
    }
}
