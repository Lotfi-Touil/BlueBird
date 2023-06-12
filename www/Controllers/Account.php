<?php
namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;

class Account extends Controller{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function profile(): void
    {
        $view = new View('Account/profile', 'account-settings');
        $view->assign('title', 'Mon compte');
    }

    public function other(): void
    {
        $view = new View('Account/other', 'account-settings');
        $view->assign('title', 'Mon compte');
    }
}