<?php

namespace Tawba\CurrencyConverter\Converters;

abstract class Converter
{
    /**
     * The API base URL webservice
     * @var string
     */
    private $base_url;
    
    /**
     * Constructor for setting API base_url.
     *
     * @param $config
     *
     * @return void
     */
    public function __construct($config = [])
    {
        $this->base_url = array_get($config, 'base_url', $this->base_url);
    }
    
    /**
     * The convert method
     *
     * @param $from
     * @param $to
     * @param $amount
     *
     * @return mixed
     */
    abstract public function convert($from, $to, $amount);
}
