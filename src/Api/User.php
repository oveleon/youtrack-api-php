<?php

namespace Oveleon\YouTrack\Api;

use Oveleon\YouTrack\Api\Issue\Comment;
use Oveleon\YouTrack\Api\Issue\Tag;
use Oveleon\YouTrack\Api\Issue\TimeTracking;

class User extends AbstractApi {

  /**
   * Overwrites the default fields for users.
   */
  protected function defaultFields(): self {
    $this->addFields([
      'id',
      'login',
      'fullName',
      'email',
      'ringId',
      'guest',
      'online',
      'banned',
      'tags',
      'savedQueries',
      'avatarUrl',
      'profiles',
    ]);

    return $this;
  }

  /**
   * Returns all users.
   */
  public function all(): array {
    return $this->get("users");
  }

  /**
   * Returns one user by id.
   */
  public function one(string $userId): array {
    return $this->get("users/$userId");
  }

  /**
   * Creates a new user.
   */
  public function create(array $parameter): array {
    return $this->post("users", $parameter);
  }

  /**
   * Update an existing user.
   */
  public function update(string $userId, array $parameter): array {
    return $this->post("users/$userId", $parameter);
  }


}
