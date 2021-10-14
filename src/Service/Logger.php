<?php

declare(strict_types=1);

namespace App\Service;

use Psr\Log\LoggerInterface;
use App\Domain\Shared\Logger\Logger as DomainLoggerInterface;

class Logger implements DomainLoggerInterface, LoggerInterface
{
    /** @var LoggerInterface $logger **/
    private $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
    public function emergency($message, array $context = array()): void
    {
        $this->logger->emergency($message, $context);
    }
    public function alert($message, array $context = array()): void
    {
        $this->logger->alert($message, $context);
    }
    public function critical($message, array $context = array()): void
    {
        $this->logger->critical($message, $context);
    }
    public function error($message, array $context = array()): void
    {
        $this->logger->error($message, $context);
    }
    public function warning($message, array $context = array()): void
    {
        $this->logger->warning($message, $context);
    }
    public function notice($message, array $context = array()): void
    {
        $this->logger->notice($message, $context);
    }
    public function info($message, array $context = array()): void
    {
        $this->logger->info($message, $context);
    }
    public function debug($message, array $context = array()): void
    {
        $this->logger->debug($message, $context);
    }
    public function log($level, $message, array $context = array()): void
    {
        $this->logger->log($message, $message, $context);
    }
}
