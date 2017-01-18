<?php

namespace Tawba\CurrencyConverter\Config;

use Tawba\CurrencyConverter\Converters\Google;
use Tawba\CurrencyConverter\Converters\Yahoo;

Class Config
{
    /**
     * The drivers array
     */
    public static $drivers = [
        'google' => Google::class,
        'yahoo'  => Yahoo::class,
    ];
    
    /**
     * Google Data
     */
    public static $google = [
        'base_url' => 'http://www.google.com/finance/converter?a=',
    ];
    
    /**
     * Yahoo Data
     */
    public static $yahoo = [
        'base_url' => 'http://query.yahooapis.com/v1/public/yql',
    ];
    
}
