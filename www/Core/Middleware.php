<?php

namespace App\Core;

use App\Core\Model;

abstract class Middleware extends Model
{
    abstract public function handle();

    // TODO : il faut utiliser les tokens au lieu d'un login
    protected function getTokenLogin()
    {
        return $_SESSION['login'];
    }

}
