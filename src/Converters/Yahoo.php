<?php

namespace Tawba\CurrencyConverter\Converters;

use Tawba\CurrencyConverter\Config\Config;
use Tawba\CurrencyConverter\Services\Connector;

class Yahoo implements Converter
{
    /**
     * The API base URL for Yahoo finance webservice
     * @var string
     */
    private $base_url;
    
    /**
     * Yahoo constructor for setting basic data for the webservice.
     */
    public function __construct()
    {
        $this->base_url = Config::$yahoo['base_url'];
    }
    
    /**
     * The base convert method
     *
     * @param $from
     * @param $to
     * @param $amount
     *
     * @return mixed
     */
    public function convert($from, $to, $amount)
    {
        $url_query = 'select * from yahoo.finance.xchange where pair in ("' . $from . $to . '")';
        $url       = $this->base_url . "?q=" . urlencode($url_query);
        $url       .= "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
        
        $connector       = new Connector($url);
        $request_result  = $connector->run();
        $value           = json_decode($request_result, true);
        $currency_output = (float)$amount * $value['query']['results']['rate']['Rate'];
        
        return $currency_output;
    }
    
}
