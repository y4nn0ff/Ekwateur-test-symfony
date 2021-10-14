<?php declare(strict_types=1);


namespace App\Domain\Shared\Logger;


interface Logger {
    /** @param array<string>  $context **/
    public function emergency(string $message, array $context = array()) : void;
    /** @param array<string>  $context **/
    public function alert(string $message, array $context = array()) : void;
    /** @param array<string>  $context **/
    public function critical(string $message, array $context = array()) : void;
    /** @param array<string>  $context **/
    public function error(string $message, array $context = array()) : void;
    /** @param array<string>  $context **/
    public function warning(string $message, array $context = array()) : void;
    /** @param array<string>  $context **/
    public function notice(string $message, array $context = array()) : void;
    /** @param array<string>  $context **/
    public function info(string $message, array $context = array()) : void;
    /** @param array<string>  $context **/
    public function debug(string $message, array $context = array()) : void;
    /** @param array<string>  $context **/
    public function log(int $level, string $message, array $context = array()) : void;
}