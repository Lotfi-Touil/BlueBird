<?php
namespace App\Controllers;

use App\Core\View;

class AccountController extends Controller{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function profile(): void
    {
        view('Account/profile', 'account-settings', [
            'title' => 'Mon compte'
        ]);
    }

    public function other(): void
    {
        view('Account/other', 'account-settings', [
            'title' => 'Mon compte'
        ]);
    }
}