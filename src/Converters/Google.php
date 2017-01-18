<?php

namespace Tawba\CurrencyConverter\Converters;

use Tawba\CurrencyConverter\Services\Connector;

class Google implements Converter
{
    /**
     * The API base URL For Google finance webservice
     * @var string
     */
    private $base_url = "http://www.google.com/finance/converter?a=";
    
    /**
     * Google constructor.
     */
    public function __construct()
    {
        // Do nothing for now.
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
        $url            = $this->base_url . urlencode($amount) . "&from=" . urlencode($from) . "&to=" . urlencode($to);
        $connector      = new Connector($url);
        $request_result = $connector->run();
        
        $data = explode('bld>', $request_result);
        $data = (!empty($data[1]) && !empty(explode($to, $data[1]))) ? explode($to, $data[1]) : ['0.00'];
        
        return round($data[0], 4);
    }
}
