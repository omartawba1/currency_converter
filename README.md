## Description

Currency converter package helps you to easily convert any amount from specific currency to another one.


## Installation
Using Composer :

```
composer install
```

Or you can do

```
composer require tawba/currency-converter
```

If you don't have composer, you can get it from [Composer](https://getcomposer.org/)


## Run the application

```
php index.php
```

## Usage

```
use Tawba\CurrencyConverter\ConverterService;

$from_currency = "USD";
$to_currency   = "EGP";
$amount        = 1000;

$converter = new ConverterService(); // You can pass "google" or "yahoo" as a service API
echo $converter->convert($from_currency, $to_currency, $amount);
```

You can test it by changing $from_currency, $to_currency, and $amount that exist inside index.php file

Notice: This package uses Google currency converter API.