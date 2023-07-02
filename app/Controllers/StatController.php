<?php
namespace App\Controllers;

class StatController extends Controller
{

    public function dashboardAction()
    {
        $scripts =  [
            '/vendor/chart.js/Chart.min.js',
            '/vendor/chart.js/demo/chart-area-demo.js',
            '/vendor/chart.js/demo/chart-pie-demo.js'
        ];

        view('Stat/dashboard', 'back', [
            'title' => 'Dashboard',
            'isConnected' => isConnected()
        ], $scripts);
    }

}