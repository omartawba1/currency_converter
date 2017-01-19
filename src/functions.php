<?php


function array_get(array $ary, $key, $default=null)
{
    return $ary[$key]?: $default;
}
