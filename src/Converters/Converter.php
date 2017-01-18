<?php

namespace Tawba\CurrencyConverter\Converters;

abstract class Converter
{
    /**
     * The API base URL webservice
     * @var string
     */
    private $base_url;

    /**
     * Constructor for setting API base_url.
     */
    public function __construct($base_url=null)
    {
        if($base_url != null) {
            $this->base_url = $base_url;
        }
    }

    /**
     * The convert method
     *
     * @param $from
     * @param $to
     * @param $amount
     *
     * @return mixed
     */
    abstract public function convert($from, $to, $amount);
}
