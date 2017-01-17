<?php

namespace Tawba\CurrencyConverter\Convertors;

interface Convertor
{

    public function convert($from, $to, $amount);
}
