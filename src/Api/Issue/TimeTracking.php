<?php

namespace Oveleon\YouTrack\Api\Issue;

use Oveleon\YouTrack\Api\AbstractApi;

class TimeTracking extends AbstractApi
{
    /**
     * Overwrites the default fields for issue tags.
     */
    protected function defaultFields(): self
    {
        $this->addFields([
            'id',
            'workItems' => [
                'id'
            ],
            'enabled'
        ]);

        return $this;
    }

    /**
     * Returns issue time tracking items.
     */
    public function all(string $issueId): array
    {
        return $this->get("issues/$issueId/timeTracking");
    }

    /**
     * Returns all issue work items.
     */
    public function workItems(string $issueId): array
    {
        $this->addFields([
            'id',
            'author' => [
                'id'
            ],
            'creator' => [
                'id'
            ],
            'text',
            'textPreview',
            'type',
            'created',
            'updated',
            'duration' => [
                'id',
                'minutes',
                'presentation'
            ],
            'date',
            'issue',
            'attributes'
        ]);

        return $this->get("issues/$issueId/timeTracking/workItems");
    }
}
