<?php

namespace Oveleon\YouTrack\Api\Issue;

use Oveleon\YouTrack\Api\AbstractApi;

class Tag extends AbstractApi
{
    /**
     * Overwrites the default fields for issue tags.
     */
    protected function defaultFields(): self
    {
        $this->addFields([
            'id',
            'issues',
            'color',
            'untagOnResolve',
            'visibleFor',
            'updateableBy',
            'readSharingSettings',
            'tagSharingSettings',
            'updateSharingSettings',
            'owner',
            'name'
        ]);

        return $this;
    }

    /**
     * Find all issue tags.
     */
    public function all(string $issueId): array
    {
        return $this->get("issues/$issueId/tags");
    }
}
