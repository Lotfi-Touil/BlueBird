<?php
namespace App\Controllers;

use App\Core\View;

class AccountController extends Controller{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function profile(): void
    {
        $view = new View('Account/profile', 'account-settings');
        $view->assign('title', 'Mon compte');
        $view->render();
    }

    public function other(): void
    {
        $view = new View('Account/other', 'account-settings');
        $view->assign('title', 'Mon compte');
        $view->render();
    }
}