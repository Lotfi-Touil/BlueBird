<?php

if (onProd()) {
    include('config.prod.php');
} else {
    include('config.dev.php');
}

include('constants.php');
include('sql_config.php');