<?php

namespace App\Middlewares;

use App\Core\SQL;

abstract class Middleware extends SQL
{
    public function __construct() {
        parent::__construct();
    }

    abstract public function handle();

    // TODO : il faut utiliser les tokens au lieu d'un login
    protected function getTokenLogin()
    {
        return $_SESSION['login'];
    }

}
