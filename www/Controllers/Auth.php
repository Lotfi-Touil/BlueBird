<?php
namespace App\Controllers;

use App\Core\View;

class Auth{

    public function login(): void
    {
        $view = new View('Auth/login', 'back');
        $view->assign('title', 'Blue Bird | Connexion');
    }

    public function logout(): void
    {
        $view = new View('Auth/logout', 'back');
        $view->assign('title', 'Blue Bird | Déconnexion');
    }

    public function register(): void
    {
        $view = new View('Auth/register', 'back');
        $view->assign('title', 'Blue Bird | Inscription');
    }

}