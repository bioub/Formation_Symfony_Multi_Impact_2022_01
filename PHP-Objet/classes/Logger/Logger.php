<?php

namespace MultiImpact\Logger;

use MultiImpact\Writer\WriterInterface;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Psr\Log\LogLevel;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    protected WriterInterface $writer;

    public function __construct($writer) {
        $this->writer = $writer;
    }

    public function log($level, string|\Stringable $message, array $context = []): void {
        $date = date('H:i:s');
        $this->writer->write("[$level] $date - $message");
    }
}