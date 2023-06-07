<?php
namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;

class Stat extends Controller
{
    
    public function dashboard()
    {
        $view = new View('Stat/dashboard', 'back');
        $view->assign('title', 'Dashboard');
        $view->assign('isConnected', UtilsAuth::isConnected());
        $view->addScript('assets/vendor/chart.js/Chart.min.js');
        $view->addScript('assets/vendor/chart.js/demo/chart-area-demo.js');
        $view->addScript('assets/vendor/chart.js/demo/chart-pie-demo.js');
    }

}