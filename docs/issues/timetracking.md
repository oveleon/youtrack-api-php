# Issue Time Tracking
```php 
$youtrack->issues()
         ->timeTracking()
```

##### `all($issueId)`
Returns all issue time tracking items based on the issue ID.

##### `workItems($issueId)`
Returns a specific issue based on the issue ID.

## Default return fields
```php
[
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
]
```
!> Go to [Fields](fields.md) to learn more about default return fields.
