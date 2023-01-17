# Issue Tags
```php 
$youtrack->issues()
         ->tags()
```

##### `all($issueId)`
Returns all issue tags based on the issue ID.

## Default return fields
```php
[
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
]
```
!> Go to [Fields](fields.md) to learn more about default return fields.
