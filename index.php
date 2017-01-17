<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use CurrencyConverter\ConverterController;

$from_currency = "USD";
$to_currency   = "EGP";
$amount        = 1000;

$converter = new ConverterController($from_currency, $to_currency, $amount);

echo "<pre>" . $converter->convert() . "</pre>";
