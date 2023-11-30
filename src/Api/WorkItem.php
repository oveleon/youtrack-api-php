<?php

namespace Oveleon\YouTrack\Api;

use Oveleon\YouTrack\Api\Issue\Comment;
use Oveleon\YouTrack\Api\Issue\Tag;
use Oveleon\YouTrack\Api\Issue\TimeTracking;

class WorkItem extends AbstractApi
{
    /**
     * Overwrites the default fields for issues.
     */
    protected function defaultFields(): self
    {
        $this->addFields([
            'id',
            'author' => [
              'id'
            ],
            'becomesRemoved',
            'created',
            'creator',
            'date',
            'description',
            'duration' => [
              'presentation',
              'minutes'
            ],
            'isNew',
            'type',
            'updated',
            'issue' =>[
              'id',
              'customFields' => [
                'name',
                '$type',
                'value' => [
                  'name'
                ],
              ],
            ]
        ]);

        return $this;
    }

    /**
     * Returns all issues.
     */
    public function all(): array
    {
        return $this->get("workItems");
    }

    /**
     * Returns one issue by id.
     */
    public function one(string $workItemId): array
    {
        return $this->get("workItems/$workItemId");
    }

  public function query(string $name, string $value): self
  {
    $this->addQuery($name, $value);

    return $this;
  }
}
