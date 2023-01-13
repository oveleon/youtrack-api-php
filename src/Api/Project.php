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
    public function findAll(): array
    {
        return $this->get("projects");
    }

    /**
     * Find one project.
     */
    public function findOne($projectId): array
    {
        $this->addQuery("$projectId");

        return $this->get("projects");
    }
}
