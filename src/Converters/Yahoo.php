<?php

namespace Tawba\CurrencyConverter\Converters;

use Tawba\CurrencyConverter\Services\HttpClient;

class Yahoo extends Converter
{
    /**
     * The API base URL for Yahoo finance webservice
     * @var string
     */
    private $base_url = 'http://query.yahooapis.com/v1/public/yql';

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
        $url = $this->base_url . "?" . http_build_query([
            'q'      => $url_query,
            'format' => 'json',
            'env'    => 'store://datatables.org/alltableswithkeys',
        ]);
        $client          = new HttpClient($url);
        $request_result  = $client->run();
        $value           = json_decode($request_result, true);
        $rate            = $value['query']['results']['rate']['Rate'];
        $currency_output = (float) $amount * $rate;

        return $currency_output;
    }

}
