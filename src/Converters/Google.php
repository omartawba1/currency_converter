<?php

namespace Tawba\CurrencyConverter\Converters;

use Tawba\CurrencyConverter\Services\HttpClient;

class Google extends Converter
{
    /**
     * The API base URL For Google finance webservice
     * @var string
     */
    private $base_url = 'http://www.google.com/finance/converter';


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
        $url = $this->base_url. '?' . http_build_query(['a' => $amount, 'from' => $from, 'to' => $to]);

        $client      = new HttpClient($url);
        $request_result = $client->run();

        $data = explode('bld>', $request_result);
        $data = (!empty($data[1]) && !empty(explode($to, $data[1]))) ? explode($to, $data[1]) : ['0.00'];

        return round($data[0], 4);
    }
}
