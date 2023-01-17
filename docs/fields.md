# Fields
The YouTrack API returns only the fields `id` and `$type` if no other fields are specified. In order to retrieve other fields already in the standard, which are often needed, this library adds standard fields for each endpoint.

## Define return fields
Before each query, the fields to be retrieved can be defined.

```php
$youtrack->issues()                     
         ->fields(['idReadable', 'summary', 'description'])
         ->all();
