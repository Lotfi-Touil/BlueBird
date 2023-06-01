<?php
namespace App\Controllers;

use App\Core\Request;
use App\Core\View;
use \App\Models\User;
use \App\Forms\Register;

class Auth extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function login(): void
    {
        $view = new View('Auth/login', 'front');
        $view->assign('title', 'Blue Bird | Connexion');
    }

    public function logout(): void
    {
        $view = new View('Auth/logout', 'front');
        $view->assign('title', 'Blue Bird | Déconnexion');
    }

    public function register(): void
    {
        $form = new Register();

        $view = new View('Auth/register', 'front');
        $view->assign('form', $form->getConfig());
        $view->assign('title', 'Blue Bird | Inscription');
        
        if ($form->isSubmited() && $form->isValid()) {
            $post = $this->getRequest()->getPost();
            $user = new User();
            // TODO : Gérer les updates
            // $user->populate(2);
            $user->setFirstname($post->firstname);
            $user->setLastname($post->lastname);
            $user->setEmail($post->email);
            $user->setPassword($post->password);
            $user->setStatus(1);
            // TODO : Gérer les utilisateurs
            // $user->setCountry('FR');
            $user->save();
            header("Location: /");
        }

        $view->assign("formErrors", $form->errors);
    }

}