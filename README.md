# YouTrack API for PHP
This bundle is a PHP wrapper for the YouTrack REST API. It allows communication with your YouTrack instance.

## Installation
```
$ composer require oveleon/youtrack-api-php
```

## Getting Started
```PHP
use Oveleon\YouTrack\Client;
use Oveleon\YouTrack\HttpClient\HttpClient;

// Create http client to use.
//  You can write your own adapter and use the HttpClientInterface to use e.g. the Guzzle HttpClient.
//  By default, the HttpClient of Symfony is used.
$httpClient = new HttpClient('https://example.myjetbrains.com', 'perm:your-token');

// Create api client
$api = new Client($httpClient);

// Get issues
$issues = $api->issues()
              ->findByProject('PROJECT_ID');

// Refine the query
$issues = $api->issues()
              ->query('state:resolved')
              ->findAll();

// Cool, but now we would like to specify the return fields...
$issues = $api->issues()
              ->fields(['summary', 'description'])
              ->query('state:resolved')
              ->findAll();

// The query on a specific Project can also be refined in exactly the same way
$issues = $api->issues()
              ->query('state:unresolved')
              ->findByProject('PROJECT_ID');

// The predefined query `findByProject` does nothing more than define a query,
// so you could also define the following query to get the same result
$issues = $api->issues()
              ->query('project:SampleProject')
              ->findAll();

// And now we go to another entry point
$projects = $api->projects()
                ->findAll();

// ...
```

## Documentation
- ~~Project~~
- ~~Issues~~

## References
- Use [Parsedown](https://github.com/erusev/parsedown) or other Markdown parsers to convert descriptions of issues and the like into HTML.

## ToDo:
- [ ] Test multiple queries
- [ ] Allow nested field definitions for customFields
- [ ] Create Documentation
