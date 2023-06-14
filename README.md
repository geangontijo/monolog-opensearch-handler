### Testing
```bash
composer test 
```
### Usage
```bash
composer require geangontijo/monolog-opensearch-handler
```
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
