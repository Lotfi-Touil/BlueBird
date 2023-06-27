<?php
namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;

class Post extends Controller{

    public function postDetail(){
        $view = new View('Post/single', 'front');
        $view->assign('isConnected', UtilsAuth::isConnected());
        $view->assign('title', 'Blue Bird | Détails du post');
    }

}