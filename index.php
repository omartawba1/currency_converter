<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use CurrencyConverter\ConverterService;

$from_currency = "USD";
$to_currency   = "EGP";
$amount        = 1000;

$converter = new ConverterService($from_currency, $to_currency, $amount);

echo "<pre>" . $converter->convert() . "</pre>";
