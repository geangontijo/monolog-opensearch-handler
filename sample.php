<?php

use GeanGontijo\MonologOpenSearchHandler\OpenSearchHandler;
use Monolog\Logger;
use OpenSearch\ClientBuilder;

require_once __DIR__ . '/vendor/autoload.php';

$logger = new Logger('application');
$logger->pushHandler(new OpenSearchHandler(
    ClientBuilder::create()->setHosts([
        'http://localhost:9200'
    ])->build(),
    'monolog'
));

$logger->info('Hello, world!');
