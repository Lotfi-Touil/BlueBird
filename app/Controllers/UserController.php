<?php

namespace App\Controllers;
use App\Requests\UserRequest;
use App\Core\View;
use App\Models\User;

class UserController extends Controller
{


    public function listAction()
    {
        $scripts =  [
            '/js/datatables/datatables.min.js',
            '/js/datatables/user-list.js',
        ];

        view('user/back/list', 'back', [
            'users' => User::all()
        ], $scripts);
    }

    public function createAction(): void
    {
        view('user/back/create', 'back');
    }

    public function storeAction(): void
    {
        $request = new UserRequest();

        if (!$request->createUser()) {
            view('user/back/create', 'back', [
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function showAction($id): void
    {
        $user = User::find($id);

        if (!$user)
            $this->redirectToList();

        view('user/back/show', 'back', [
            'user' => $user
        ]);
    }

    public function editAction($id): void
    {
        $user = User::find($id);

        if (!$user)
            $this->redirectToList();

        view('user/back/edit', 'back', [
            'user' => $user
        ]);
    }

    public function updateAction($id): void
    {
        $user = User::find($id);

        if (!$user) {
            $this->redirectToList();
        }

        $request = new UserRequest();

        if (!$request->updateUser($user)) {
            view('user/back/edit', 'back', [
                'user'   => $user,
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function deleteAction($id): void
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        }

        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/user/list');
        exit();
    }
}
