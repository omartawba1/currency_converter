#!/usr/bin/env php
<?php

// Composer autoload
require_once __DIR__ . '/vendor/autoload.php';

use Tawba\CurrencyConverter\ConverterService;
use Tawba\CurrencyConverter\ConverterManager;

array_shift($argv); // Get rid of the first value as it's the command invocation name.

$command = array_shift($argv);

switch ($command) {
    
    case 'convert':
        $from      = array_shift($argv) ?: "USD";
        $to        = array_shift($argv) ?: "EGP";
        $amount    = array_shift($argv) ?: 1000;
        $provider  = array_shift($argv) ?: 'google';
        $converter = new ConverterService($provider);
        echo "<pre>" . $converter->convert($from, $to, $amount) . "</pre>";
        break;
    
    case 'list':
        echo "The available currency conversion provider are: " . join(', ',
                array_keys(ConverterManager::$drivers)) . ".\n";
        break;
    
    default:
        printHelp();
        break;
}
