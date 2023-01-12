# YouTrack API for PHP
This bundle is a PHP wrapper for the YouTrack REST API. It allows communication with your YouTrack instance.

## Installation
```
$ composer require oveleon/youtrack-api-php
```

## Getting Started
```PHP
use Oveleon\YouTrack\Client;
use Oveleon\YouTrack\HttpClient\SymfonyHttpClient;

// Create http client to use
$httpClient = new SymfonyHttpClient('https://example.myjetbrains.com', 'perm:your-token');

// Create api client
$api = new Client($httpClient);

// Get issues
$issues = $api->issues()->findAll('PROJECT_ID');
```

## Documentation
- Project
- Issues
