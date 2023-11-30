<?php

namespace Oveleon\YouTrack\Api;

class WorkItem extends AbstractApi
{
    /**
     * Overwrites the default fields for work items.
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
     * Returns all work items.
     */
    public function all(): array
    {
        return $this->get("workItems");
    }

    /**
     * Returns one work item by id.
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
