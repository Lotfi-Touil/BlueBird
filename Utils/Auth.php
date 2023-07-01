<?php

namespace App\Utils;

class Auth
{
    public static function isConnected(): bool
    {
        return isset($_SESSION['login']);
    }
}
