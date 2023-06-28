<?php

namespace App\Middlewares;

class AuthMiddleware extends Middleware
{
    public function handle()
    {
        if (!$this->isUserAuthenticated()) {
            header('Location: /login');
            exit();
        }
    }

    private function isUserAuthenticated(): bool
    {
        // TODO: Implémenter la logique d'authentification ici
        // Vous pouvez utiliser des tokens, des sessions ou tout autre mécanisme d'authentification de votre choix

        return isset($_SESSION['login']);
    }
}
