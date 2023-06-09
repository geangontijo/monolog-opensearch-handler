<?php

namespace GeanGontijo\MonologOpenSearchHandler;

use Monolog\Formatter\ScalarFormatter;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;
use Monolog\LogRecord;
use OpenSearch\Client;

class OpenSearchHandler extends AbstractProcessingHandler
{
    public function __construct(
        protected readonly Client $client,
        protected readonly string $index,
        int|string|Level $level = Level::Debug,
        bool $bubble = true
    ) {
        parent::__construct($level, $bubble);
    }

    /**
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $this->client->create([
            'index' => $this->index,
            'body' => $record->formatted
        ]);
    }

    public function getDefaultFormatter(): ScalarFormatter
    {
        return new ScalarFormatter();
    }
}