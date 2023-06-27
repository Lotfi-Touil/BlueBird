<?php
namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;

class Main extends Controller{

    public function home(){
        $view = new View('Main/home', 'front');
        $view->assign('isConnected', UtilsAuth::isConnected());
    }

}