<?php

namespace Tawba\CurrencyConverter;

use Tawba\CurrencyConverter\Config\Config;
use Tawba\CurrencyConverter\Services\Connector;
use Tawba\CurrencyConverter\Converters\Google;
use Tawba\CurrencyConverter\Converters\Yahoo;
use ReflectionClass;

class ConverterService
{
    /**
     * The driver object "Google, yahoo, ...etc"
     * @var object
     */
    private $driver;
    
    /**
     * The converters
     * @var array
     */
    private $converters;
    
    /**
     * CurrencyConverter constructor.
     *
     * @param $driver
     */
    public function __construct($driver = 'google')
    {
        $this->converters = Config::$drivers;
        $driver_class     = $this->lookupConverter($driver);
        $reflection_class = new ReflectionClass($driver_class);
        $this->driver     = $reflection_class->newInstanceArgs();
    }
    
    /**
     * @param $from
     * @param $to
     * @param $amount
     *
     * @return mixed
     */
    public function convert($from, $to, $amount)
    {
        return $this->driver->convert($from, $to, $amount);
    }
    
    /**
     * @param $driver
     *
     * @return mixed
     */
    private function lookupConverter($driver)
    {
        return $this->converters[$driver];
    }
    
}
