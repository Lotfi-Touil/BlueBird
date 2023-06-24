<?php

function onProd() {
    return false;
}

function cameltoSnakeCase($input) {
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
}
