<?php

namespace Tawba\CurrencyConverter;

use Tawba\CurrencyConverter\Converters\Google;
use Tawba\CurrencyConverter\Converters\Yahoo;
use Tawba\CurrencyConverter\Exceptions\DriverNotFoundException;

class ConverterManager
{

    /**
     * The drivers array
     */
    public static $drivers = [
        'google' => Google::class,
        'yahoo'  => Yahoo::class,
    ];

    public static function registerDriver($name, $driverClass)
    {
        if(!array_key_exists($name, self::$drivers)) {
            self::$drivers[$name] = $driverClass;
        }
    }

    public static function findByName($name)
    {
        if(!array_key_exists($name, self::$drivers)) {
            throw new DriverNotFoundException("Driver [$name] not known!");
        }
        return self::$drivers[$name];
    }

    private static function buildConverter($driverClass, $args)
    {
        $reflectionClass = new \ReflectionClass($driverClass);
        return $reflectionClass->newInstanceArgs($args);
    }

    public static function makeByName($name, $args=[])
    {
        $driverClass = self::findByName($name);
        return self::buildConverter($driverClass, $args);
    }
}
