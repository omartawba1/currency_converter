<?php

if (!function_exists('array_get')) {
    /**
     * Get data from array
     *
     * @param array $ary
     * @param       $key
     * @param null  $default
     *
     * @return null
     */
    function array_get(array $ary, $key, $default = null)
    {
        return $ary[$key] ?: $default;
    }
}