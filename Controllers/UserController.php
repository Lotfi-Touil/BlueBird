<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class UserController extends Controller
{
    public function listAction()
    {
        $view = new View('user/back/list', 'back');
        $view->assign('users', User::all());
        $view->render();
    }
}
