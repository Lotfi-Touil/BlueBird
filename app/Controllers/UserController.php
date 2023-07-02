<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function listAction()
    {
        view('user/back/list', 'back', [
            'users' => User::all()
        ]);
    }

    // TODO
    public function createAction(): void
    {
        $this->redirectToList();
    }

    // TODO
    public function storeAction(): void
    {
        $this->redirectToList();
    }

    // TODO
    public function showAction($id): void
    {
        $this->redirectToList();
    }

    // TODO
    public function editAction($id): void
    {
        $this->redirectToList();
    }

    // TODO
    public function updateAction(): void
    {
        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/user/list');
        exit();
    }
}
