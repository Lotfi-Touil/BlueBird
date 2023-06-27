<?php
namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;

class Movie extends Controller{

    public function movieDetail(){
        $view = new View('Movie/single', 'front');
        $view->assign('isConnected', UtilsAuth::isConnected());
        $view->assign('title', 'Blue Bird | Détails du film');
    }

}