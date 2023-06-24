<?php

namespace App\Middlewares;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;

class AuthMiddleware extends Middleware
{
    protected $requiredRole;

    public function __construct($requiredRole)
    {
        $this->requiredRole = $requiredRole;
        parent::__construct();
    }

    public function handle()
    {
        if (!$this->isUserHasRequiredRole()) {
            header('Location: /');
            exit();
        }
    }

    private function isUserHasRequiredRole(): bool
    {
        $User = new User();
        // TODO Lotfi : il faudra récupérer via un token et non un mail
        $id_user = $User->getOneBy(['email' => $this->getTokenLogin()], ['id']);
        if (!$id_user)
            return false;

        $Role = new Role();
        $requiredRoleId = $Role->getRoleIdByName($this->requiredRole);

        $UserRole = new UserRole();
        $idUserRole = $UserRole->getOneBy(['id_user' => $id_user[0], 'id_role' => $requiredRoleId], ['id']);

        return $idUserRole ? true : false;
    }

}
