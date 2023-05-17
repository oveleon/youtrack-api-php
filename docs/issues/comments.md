# Issue Comments
```php 
$youtrack->issues()
         ->comments()
```

##### `all($issueId)`
Returns all issue comments.

##### `one($issueId, $commentId)`
Returns a specific issue based on the issue and comment ID.

## Default return fields
```php
[
    'id',
    'text',
    'textPreview',
    'created',
    'updated',
    'author' => [
        'name'
    ],
    'issue' => [
        'idReadable'
    ],
    'attachments',
    'visibility',
    'deleted'
]
```
!> Go to [Fields](fields.md) to learn more about default return fields.
