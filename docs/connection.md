# Connect to the API
To connect to your YouTrack instance API, two steps are required.

## HTTP Client
The HTTP client is used to communicate with the API and is passed to the API client. This approach allows you to use your own HTTP clients. By default, an HTTP client is already shipped that is based on the Symfony HTTP client and expects the YouTrack URL and a perma-token.

```php
use Oveleon\YouTrack\HttpClient\HttpClient;

$httpClient = new HttpClient('https://example.myjetbrains.com', 'perm:your-token');
```

?> To use a custom HTTP client, the `HttpClientInterface` can be used. The methods listed here must be provided for the API client.

## API Client
The API Client provides several endpoints to simplify working with the YouTrack API. It is initialized with the previously created HTTP client.

```php
use Oveleon\YouTrack\Client;

$youtrack = new Client($httpClient);
```

