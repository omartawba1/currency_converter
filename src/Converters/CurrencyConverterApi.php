<?php

namespace Tawba\CurrencyConverter\Converters;

use Tawba\CurrencyConverter\Services\HttpClient;

class CurrencyConverterApi extends Converter
{
    /**
     * The default API base URL For CurrencyConverterApi webservice
     * @var string
     */
    private $base_url = 'http://free.currencyconverterapi.com/api/v3';


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
        $endpoint = '/convert';
        $query    = $from . '_' . $to;
        $url      = $this->base_url . $endpoint .'?' . http_build_query(['q' => $query, 'compact' => 'ultra']);
        $client   = new HttpClient($url);
        $request_result = $client->run();
        $json = json_decode($request_result, true);
        $rate = $json[$query];
        return (float) $rate * $amount;
    }
}


