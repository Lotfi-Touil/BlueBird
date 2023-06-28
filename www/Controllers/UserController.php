<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User as UserModel;

class UserController extends Controller
{
    public function userListAction()
    {
        $userModel = new UserModel();
        $users = $userModel->getAll();

        $view = new View('User/list', 'back');
        $view->assign('rowsUser', $users);
        $view->render();
    }
}
