<?php

namespace Tawba\CurrencyConverter\Converters;

interface Converter
{
    /**
     * The convert method
     *
     * @param $from
     * @param $to
     * @param $amount
     *
     * @return mixed
     */
    public function convert($from, $to, $amount);
}
