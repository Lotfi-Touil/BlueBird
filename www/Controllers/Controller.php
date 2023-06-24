<?php

namespace App\Controllers;

use App\Core\Request;
use App\Utils\Auth;

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
        header("Location: /");
        exit();
    }

    protected function shouldRedirectHome(): bool
    {
        return Auth::isConnected();
    }

}
