# Issues
```php 
// Endpoint
$youtrack->issues()
```

##### `all()`
Returns all issues.

##### `one($issueId)`
Returns a specific issue based on the issue ID.

##### `project($projectId)`
Returns all issues based on the project ID.

##### `customFields($issueId)`
Returns all custom fields based on the issue ID.

##### `attachments($issueId)`
Returns all attachments based on the issue ID.

## Sub-Endpoints

##### `comments()`
Returns the sub-endpoint for Comments.

##### `tags()`
Returns the sub-endpoint for Tags.

##### `timeTracking()`
Returns the sub-endpoint for Time Tracking.

## Default return fields
```php
[
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
]
```
!> Go to [Fields](fields.md) to learn more about default return fields.
