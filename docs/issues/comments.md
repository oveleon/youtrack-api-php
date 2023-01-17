# Issue Comments
```php 
$youtrack->issues()
         ->comments()
```

##### `all()`
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
    'author',
    'issue',
    'attachments',
    'visibility',
    'deleted'
]
```
!> Go to [Fields](fields.md) to learn more about default return fields.
