<?php

namespace Tawba\CurrencyConverter;

use Tawba\CurrencyConverter\Services\Connector;
use Tawba\CurrencyConverter\Convertors\Google;
use ReflectionClass;

class ConverterService
{

    private $driver;
    /**
     * CurrencyConverter constructor.
     *
     * @param $from_currency
     * @param $to_currency
     */
    public function __construct($driver='google')
    {
        $driver_class = $this->lookupConvertor($driver);
        $r = new ReflectionClass($driver_class);
        $this->driver = $r->newInstanceArgs();
    }

    public function convert($from, $to, $amount)
    {
        return $this->driver->convert($from, $to, $amount);
    }

    private function lookupConvertor($driver)
    {
        return ['google' => Google::class ][$driver];
    }

}
