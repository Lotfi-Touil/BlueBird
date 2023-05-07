<?php
namespace App\Controllers;

use App\Core\View;

class Auth{

    public function login(): void
    {
        $view = new View('Auth/login', 'back');
    }

    public function logout(): void
    {
        $view = new View('Auth/logout', 'back');
    }

    public function register(): void
    {
        $view = new View('Auth/register', 'back');
    }

}