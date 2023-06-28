<?php
namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;

class Main extends Controller{

    public function home(){
        $view = new View('Main/home', 'front');
        $view->assign('isConnected', UtilsAuth::isConnected());
    }

    //page des mentions legales
    public function legals(){
        $view = new View('Main/legals', 'front');
    }

    //page des conditions générales d'utilisations
    public function cgu(){
        $view = new View('Main/cgu', 'front');
    }

    //page données personnelles et sécuirté
    public function pds(){
        $view = new View('Main/pds', 'front');
    }

     //page cookies
     public function cookies(){
        $view = new View('Main/cookies', 'front');
    }
}