<?php

namespace Oveleon\YouTrack\Api\Issue;

use Oveleon\YouTrack\Api\AbstractApi;

class Comment extends AbstractApi
{
    /**
     * Overwrites the default fields for issue comments.
     */
    protected function defaultFields(): self
    {
        $this->addFields([
            'id',
            'text',
            'textPreview',
            'created',
            'updated',
            'author' => [
                'name'
            ],
            'issue' => [
                'idReadable'
            ],
            'attachments',
            'visibility',
            'deleted'
        ]);

        return $this;
    }

    /**
     * Find all issue comments.
     */
    public function all(string $issueId): array
    {
        return $this->get("issues/$issueId/comments");
    }

    /**
     * Find one issue comment.
     */
    public function one(string $issueId, string $commentId): array
    {
        return $this->get("issues/$issueId/comments/$commentId");
    }

    /**
     * Create issue comment.
     */
    public function create(string $issueId, array $parameter): array
    {
        return $this->post("issues/$issueId/comments", $parameter);
    }
}
