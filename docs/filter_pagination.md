# Filter & Pagination
Manipulators such as filters or pagination methods, must always be between the endpoint and the query:
```php
$youtrack->issues()  // Endpoint
         ...         // Filters or Pagination
         ->all();    // Query
```

## Filter
In YouTrack, these filters are called `queries`. Since we can also manipulate the URL query, we use the wording `filter` here.

```php
$youtrack->issues()                     
         ->filter('state:resolved')     
         ->all();                       

// Multiple filters can also be applied
$youtrack->issues()
         ->filter('state:resolved')
         ->filter('for:me')
         ->all();

// Or separated with a space
$youtrack->issues()
         ->filter('state:resolved for:me')
         ->all();
```

## Pagination
The first parameter specifies the `offset`, the second the `limit`.
```php
$youtrack->issues()               
         ->paginate(0, 10)   
         ->all();            

// In combination with filters
$youtrack->issues()                   
         ->filter('state:resolved')
         ->paginate(0, 10)       
         ->all();
```
