<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use Tawba\CurrencyConverter\ConverterService;

$from_currency = "USD";
$to_currency   = "EGP";
$amount        = 1000;

$converter = new ConverterService();

echo "<pre>" . $converter->convert($from_currency, $to_currency, $amount) . "</pre>";
