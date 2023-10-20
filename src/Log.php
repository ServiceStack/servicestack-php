<?php

namespace ServiceStack;

use Exception;

enum LogLevel : string {
    case Debug = 'Debug';
    case Info = 'Info';
    case Warn = 'Warn';
    case Error = 'Error';
}

interface Logger {
    function log(LogLevel $logLevel, mixed $message=null, ?Exception $error=null);
}

class ConsoleLogger implements Logger {

    function log(LogLevel $logLevel, mixed $message=null, ?Exception $error=null)
    {
        if (is_string($message)) {
            echo $message . "\n";
        } else {
            print_r($message);
        }
        if (isset($error)) {
            echo "ERROR: " . $error->getMessage() . "\n";
        }
    }
}

class NullLogger implements Logger {
    function log(LogLevel $logLevel, mixed $message=null, ?Exception $error=null)
    {
    }
}

class Log
{
    /** @var LogLevel[] */
    public static array $levels = [LogLevel::Warn, LogLevel::Error];
    public static Logger $logger;

    public static function debugEnabled() { 
        return isset(Log::$logger) && in_array(LogLevel::Debug, Log::$levels); 
    }
    public static function infoEnabled() { 
        return isset(Log::$logger) && in_array(LogLevel::Info, Log::$levels); 
    }
    public static function warnEnabled() { 
        return isset(Log::$logger) && in_array(LogLevel::Warn, Log::$levels); 
    }
    public static function errorEnabled() { 
        return isset(Log::$logger) && in_array(LogLevel::Error, Log::$levels); 
    }

    public static function debug(mixed $msg): void {
        if (Log::debugEnabled())
            Log::$logger->log(LogLevel::Debug, message:$msg);
    }
    public static function info(mixed $msg): void {
        if (Log::infoEnabled())
            Log::$logger->log(LogLevel::Info, message:$msg);
    }
    public static function warn(mixed $msg, ?Exception $error=null): void {
        if (Log::warnEnabled())
            Log::$logger->log(LogLevel::Warn, message:$msg, error:$error);
    }
    public static function error(mixed $msg, ?Exception $error=null): void {
        if (Log::errorEnabled())
            Log::$logger->log(LogLevel::Error, message:$msg, error:$error);
    }
}