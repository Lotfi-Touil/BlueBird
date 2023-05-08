<?php
namespace App\Controllers;

use App\Core\View;

class Stat
{
    
    public function dashboard()
    {
        $view = new View('Stat/dashboard', 'back');
        $view->addScript('assets/vendor/chart.js/Chart.min.js');
        $view->addScript('assets/vendor/chart.js/demo/chart-area-demo.js');
        $view->addScript('assets/vendor/chart.js/demo/chart-pie-demo.js');
    }

}