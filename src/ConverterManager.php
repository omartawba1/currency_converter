<?php

namespace Tawba\CurrencyConverter;

use Tawba\CurrencyConverter\Converters\Google;
use Tawba\CurrencyConverter\Converters\Yahoo;
use Tawba\CurrencyConverter\Converters\CurrencyConverterApi;
use Tawba\CurrencyConverter\Exceptions\DriverNotFoundException;

class ConverterManager
{
    /**
     * The drivers array
     */
    public static $drivers = [
        'google'                 => Google::class,
        'yahoo'                  => Yahoo::class,
        'currency_converter_api' => CurrencyConverterApi::class,
    ];
    
    /**
     * Registering the converter driver
     *
     * @param $name
     * @param $driverClass
     */
    public static function registerDriver($name, $driverClass)
    {
        if (!array_key_exists($name, self::$drivers)) {
            self::$drivers[$name] = $driverClass;
        }
    }
    
    /**
     * Find Driver By Name
     *
     * @param $name
     *
     * @return mixed
     */
    public static function findByName($name)
    {
        if (!array_key_exists($name, self::$drivers)) {
            throw new DriverNotFoundException("Driver [$name] not known!");
        }
        
        return self::$drivers[$name];
    }
    
    /**
     * Building the converter instance
     *
     * @param $driverClass
     * @param $config
     *
     * @return object
     */
    private static function buildConverter($driverClass, $config)
    {
        $reflectionClass = new \ReflectionClass($driverClass);
        
        return $reflectionClass->newInstanceArgs([$config]);
    }
    
    /**
     * Build the driver
     *
     * @param       $name
     * @param array $config
     *
     * @return object
     */
    public static function makeByName($name, $config = [])
    {
        $driverClass = self::findByName($name);
        
        return self::buildConverter($driverClass, $config);
    }
}
