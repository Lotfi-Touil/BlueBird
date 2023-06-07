<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\View;

class Controller
{
    private $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    protected function getRequest()
    {
        return $this->request;
    }

    protected function redirectHome() : void
    {
        new View('Main/home', 'front');
    }
}