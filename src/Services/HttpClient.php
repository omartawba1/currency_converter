<?php

namespace Tawba\CurrencyConverter\Services;

class HttpClient
{
    /**
     * The API URL
     * @var string $url
     */
    private $url;

    /**
     * The API Request Headers
     * @var array $headers
     */
    private $headers;

    /**
     * The API method calling
     * @var string $method
     */
    private $method;

    /**
     * HttpClient constructor to set the API URL & Headers.
     *
     * @param       $url
     * @param       $method
     * @param array $headers
     */
    public function __construct($url, $method = 'GET', $headers = [])
    {
        $this->url     = $url;
        $this->headers = $headers;
        $this->method  = $method;
    }

    /**
     * Executing the API Call
     *
     * @return array
     */
    public function run()
    {
        $ch  = curl_init();
        $url = $this->url;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

}
