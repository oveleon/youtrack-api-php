# Quick start

After the installation, the library can be used like this.
```php
use Oveleon\YouTrack\Client;
use Oveleon\YouTrack\HttpClient\HttpClient;

// Create http client to use.
$httpClient = new HttpClient('https://example.myjetbrains.com', 'perm:your-token');

// Create api client
$youtrack = new Client($httpClient);

// Get issues
$issues = $youtrack->issues()
                   ->all();
```
