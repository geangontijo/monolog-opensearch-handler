### Testing
```bash
composer test 
```
### Usage
```php
$logger = new \Monolog\Logger('application');
$logger->pushHandler(new \GeanGontijo\MonologOpenSearchHandler\OpenSearchHandler(
    \OpenSearch\ClientBuilder::create()->setHosts([
        'http://localhost:9200'
    ])->build(),
    'index_name',
));

$logger->info('Hello World');
```
