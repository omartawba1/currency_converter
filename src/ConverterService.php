<?php

namespace Tawba\CurrencyConverter;

use Tawba\CurrencyConverter\ConverterManager;

class ConverterService
{
    /**
     * The driver object "Google, yahoo, ...etc"
     * @var object
     */
    private $driver;

    /**
     * CurrencyConverter constructor.
     *
     * @param $driver name
     */
    public function __construct($driver = 'google')
    {
        $this->driver = $this->makeDriver($driver);
    }

    /**
     * @param $driver
     *
     * @return mixed
     */
    private function makeDriver($driver)
    {
        return ConverterManager::makeByName($driver);
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
}
