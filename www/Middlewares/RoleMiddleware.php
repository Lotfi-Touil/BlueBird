<?php

namespace App\Middlewares;

use App\Exceptions\HttpException;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;

class RoleMiddleware extends Middleware
{
    protected $requiredRole;

    public function __construct($requiredRole)
    {
        $this->requiredRole = $requiredRole;
        parent::__construct();
    }

    public function handle()
    {
        if (!$this->hasRequiredRole()) {
            redirectHome();
        }
    }

    private function hasRequiredRole(): bool
    {
        $userModel = new User();
        // TODO Lotfi : il faudra récupérer via un token et non un mail
        $id_user = $userModel->getOneBy(['email' => $this->getTokenLogin()], ['id']);
        if (!$id_user)
            return false;

        $Role = new Role();
        $requiredRoleId = $Role->getRoleIdByName($this->requiredRole);

        $UserRole = new UserRole();
        $idUserRole = $UserRole->getOneBy(['id_user' => $id_user[0], 'id_role' => $requiredRoleId], ['id']);

        return $idUserRole ? true : false;
    }
}
