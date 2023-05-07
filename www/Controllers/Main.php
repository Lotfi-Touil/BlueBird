<?php
namespace App\Controllers;

use App\Core\View;

class Main {

    public function home(){
        $pseudo = 'John Wick';
        $view = new View('Main/home', 'front');
        $view->assign('pseudo', $pseudo);
    }

}