<?php
namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;

class MainController extends Controller{

    public function homeAction() {
        $view = new View('Main/home', 'front');
        $view->assign('isConnected', UtilsAuth::isConnected());
        $view->render();
    }

}