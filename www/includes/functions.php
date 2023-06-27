<?php

function onProd(): bool
{
    return false;
}

function cameltoSnakeCase($str): string
{
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
}

function snakeToCamelCase($str): string
{
    return str_replace('_', '', ucwords($str, '_'));
}
