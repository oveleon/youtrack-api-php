<?php

namespace Oveleon\YouTrack\Api;

class Project extends AbstractApi
{
    /**
     * Overwrites the default fields for projects.
     */
    protected function defaultFields(): self
    {
        $this->addFields([
           'id',
           'name',
           'shortName'
        ]);

        return $this;
    }

    /**
     * Find all projects.
     */
    public function all(): array
    {
        return $this->get("projects");
    }

    /**
     * Find one project.
     */
    public function one($projectId): array
    {
        $this->addFilter("$projectId");

        return $this->get("projects");
    }
}
