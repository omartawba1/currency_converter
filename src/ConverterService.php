<?php

namespace CurrencyConverter;

use CurrencyConverter\Services\Connector;

class ConverterService
{
    /**
     * The API base URL "For now it's Google"
     * @var string
     */
    private $base_url = "http://www.google.com/finance/converter?a=";
    
    /**
     * The Currency that you want to convert
     * @var string $from_currency
     */
    private $from_currency;
    
    /**
     * The currency that you want to convert to
     * @var string $to_currency
     */
    private $to_currency;
    
    /**
     * The amount that you want to convert to
     * @var float $amount
     */
    private $amount;
    
    /**
     * CurrencyConverter constructor.
     *
     * @param $from_currency
     * @param $to_currency
     */
    public function __construct($from_currency, $to_currency, $amount)
    {
        $this->from_currency = urlencode($from_currency);
        $this->to_currency   = urlencode($to_currency);
        $this->amount        = urlencode($amount);
    }
    
    /**
     * Converting the currency
     *
     * @return float
     */
    public function convert()
    {
        $url            = $this->base_url . urlencode($this->amount) . "&from=" . $this->from_currency . "&to=" . $this->to_currency;
        $connection     = new Connector($url);
        $request_result = $connection->run();
        
        $data = explode('bld>', $request_result);
        $data = (!empty($data[1]) && !empty(explode($this->to_currency, $data[1]))) ? explode($this->to_currency,
            $data[1]) : ['0.00'];
        
        return round($data[0], 4);
    }
}