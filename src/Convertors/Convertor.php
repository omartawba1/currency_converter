<?php

namespace CurrencyConverter\Convertors;

interface Convertor
{

    public function convert($from, $to, $amount);
}
