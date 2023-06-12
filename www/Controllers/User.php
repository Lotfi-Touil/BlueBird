<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User as UserModel;

class User extends Controller
{
    public function userList()
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();

        $view = new View('User/list', 'back');
        $view->assign('rowsUser', $users);
    }
}
