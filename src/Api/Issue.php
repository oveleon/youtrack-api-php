<?php

namespace Oveleon\YouTrack\Api;

use Oveleon\YouTrack\Api\Issue\Comment;

class Issue extends AbstractApi
{
    public function findAll(): array
    {
        // ToDo: Work´s so far... Now handle fields to return
        return $this->get("issues?fields=id,summary,project(name)");
    }

    public function findByProject($projectId): array
    {
        return $this->get("issues?fields=id,summary,project(name)&query=project:{$projectId}");
    }

    public function comments(): Comment
    {
        return new Comment($this->getClient());
    }
}
