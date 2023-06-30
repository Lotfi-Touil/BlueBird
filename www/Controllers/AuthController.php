<?php

namespace App\Controllers;

use App\Core\QueryBuilder;
use App\Forms\Auth\Login;
use \App\Forms\Auth\Register;
use \App\Models\User;
use App\Utils\Auth as UtilsAuth;

class AuthController extends Controller{

    private array $errors = [];
 
    public function __construct()
    {
        parent::__construct();
    }

    public function loginAction(): void
    {
        if (UtilsAuth::isConnected())
            redirectHome();

        $form = new Login();

        if ($form->isSubmited() && $form->isValid()) {
            $post = $this->getRequest()->getPost();
            $this->connect($post);
        }

        view('Auth/login', 'front', [
            'title'       => 'Blue Bird | Connexion',
            'form'        => $form->getConfig(),
            'formErrors'  => $this->errors
        ]);
    }

    public function connect($post)
    {
        if (!$post)
            return null;

        $user = QueryBuilder::table('user')
            ->select()
            ->where('email', $post->email)
            ->first();

        if ($user && password_verify($post->password, $user['password'])) {
            $_SESSION['login'] = $user['email'];
            redirectHome();
        } else {
            $this->errors[] = 'Identifiants incorrects';
            return false;
        }
    }

    public function logoutAction(): void
    {
        session_destroy();
        redirectHome();
    }

    public function registerAction(): void
    {
        if (UtilsAuth::isConnected())
            redirectHome();

        $form = new Register();

        if ($form->isSubmited() && $form->isValid()) {
            $post = $this->getRequest()->getPost();
            $user = new User();
            $user->setFirstname($post->firstname);
            $user->setLastname($post->lastname);
            $user->setEmail($post->email);
            $user->setPassword($post->password);
            $user->setStatus(1); // TODO Lotfi : pour l'instant à 1
            $user->create();

            $this->connect($post);
        }

        view('Auth/register', 'front', [
            'title'       => 'Blue Bird | Inscription',
            'form'        => $form->getConfig(),
            'formErrors'  => $this->errors
        ]);
    }

}