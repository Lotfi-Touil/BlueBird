<?php

namespace App\Controllers;

use App\Core\QueryBuilder;
use App\Core\View;
use App\Forms\Login;
use \App\Models\User;
use \App\Forms\Register;
use App\Utils\Auth as UtilsAuth;

class AuthController extends Controller{

    private array $errors;
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getErrors(): array
    {
        return $this->errors ?? [];
    }

    public function loginAction(): void
    {
        if (UtilsAuth::isConnected())
            redirectHome();

        $form = new Login();

        $view = new View('Auth/login', 'front');
        $view->assign('form', $form->getConfig());
        $view->assign('isConnected', UtilsAuth::isConnected());
        $view->assign('title', 'Blue Bird | Connexion');

        if ($form->isSubmited() && $form->isValid()) {
            $post = $this->getRequest()->getPost();
            if (!$this->connect($post))
                $view->assign('formErrors', $this->getErrors());
        }

        $view->render();
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

        $view = new View('Auth/register', 'front');
        $view->assign('form', $form->getConfig());
        $view->assign('title', 'Blue Bird | Inscription');

        if ($form->isSubmited() && $form->isValid()) {
            $post = $this->getRequest()->getPost();
            $user = new User();
            $user->setFirstname($post->firstname);
            $user->setLastname($post->lastname);
            $user->setEmail($post->email);
            $user->setPassword($post->password);
            $user->setStatus(1); // TODO Lotfi : pour l'instant à 1
            $user->save();

            $this->connect($post);
        }

        $view->assign("formErrors", $form->errors);
        $view->render();
    }

}