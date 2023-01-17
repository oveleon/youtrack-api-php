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
              ->all();

// Refine the query using the filter method
$issues = $api->issues()
              ->filter('state:resolved')
              ->all();

// Cool, but now we would like to specify the return fields...
$issues = $api->issues()
              ->fields(['summary', 'description'])
              ->filter('state:resolved')
              ->all();

// The query on a specific Project can also be refined in exactly the same way
$issues = $api->issues()
              ->filter('state:unresolved')
              ->project('PROJECT_ID');

// The predefined query `findByProject` does nothing more than define a filter for you (In YouTrack the
// filter is described as `query`), so you could also define the following filter to get the same result
$issues = $api->issues()
              ->filter('project:SampleProject')
              ->all();

// Use pagination...
$issues = $api->issues()
              ->paginate(0, 10)
              ->all();

// And now we use another entry point
$projects = $api->projects()
                ->all();

// ...
```

## Documentation
[Documentation](https://oveleon.github.io/youtrack-api-php/)

## References
- YouTrack REST API [Documentation](https://www.jetbrains.com/help/youtrack/devportal/youtrack-rest-api.html)
- Use [Parsedown](https://github.com/erusev/parsedown) or other Markdown parsers to convert descriptions of issues and the like into HTML.
- A simple [ticket system](#) based on this API for the open source CMS Contao

## Contributing
The API currently supports only a subset of the available options. The basic structure has been prepared so that contributing and adding new entry points is easy. The structure should be self-explanatory, but feel free to [open an issue](https://github.com/oveleon/youtrack-api-php/issues/new) if you have any questions or comments. Supplementary queries or new entry points must be provided as [pull requests](https://github.com/oveleon/youtrack-api-php/pulls).

## ToDo:
- [ ] Create Documentation
