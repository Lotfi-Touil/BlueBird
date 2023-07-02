<?php
namespace App\Controllers;

class AccountController extends Controller{
 
    public function __construct()
    {
        parent::__construct();
    }

    public function profileAction(): void
    {
        view('Account/profile', 'account-settings', [
            'title' => 'Mon compte'
        ]);
    }

    public function otherAction(): void
    {
        view('Account/other', 'account-settings', [
            'title' => 'Mon compte'
        ]);
    }
}