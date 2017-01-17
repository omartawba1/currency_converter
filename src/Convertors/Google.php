<?php

namespace CurrencyConverter\Convertors;

use CurrencyConverter\Services\Connector;

class Google implements Convertor
{

    /**
     * The API base URL "For now it's Google"
     * @var string
     */
    private $base_url = "http://www.google.com/finance/converter?a=";

    public function __construct()
    {
        // Do nothing for now.
    }

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

