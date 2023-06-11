<?php
namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;
use App\Utils\UserUtils;


class Main extends Controller{

    public function home()
    {
        $view = new View('Main/home', 'front');
        
        $firstname = UserUtils::getLoggedInUserFirstname(); // Utiliser la méthode getLoggedInUserFirstname() de UserUtils
        
        $view->assign('firstname', $firstname);
        $view->assign('isConnected', UtilsAuth::isConnected());
    }
    
}