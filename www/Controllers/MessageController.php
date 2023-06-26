<?php

namespace App\Controllers;

use App\Core\View;
use \App\Models\Message;
use App\Forms\Message\Create;
use App\Forms\Message\front\Create as CreateFront;
use App\Forms\Message\Show;
use App\Forms\Message\Edit;

class MessageController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listAction(): void
    {
        $view = new View('message/back/list', 'back');
        $view->assign('message', Message::all());
        $view->render();
    }

    public function createAction(): void
    {
        $view = new View('message/back/create', 'back');
        $form = new Create();
        $view->assign('form', $form->getConfig());
        $view->render();
    }

    public function showAction($id): void
    {
        $view = new View('message/back/show', 'back');
        $message = Message::find($id);
    
        if (!$message) {
            return;
        }
    
        $form = new Show();
        $formConfig = $form->getConfig(); // Appel de la méthode getConfig() pour initialiser $this->config['inputs']
    
        // Définition des valeurs des champs du formulaire
        $formConfig['inputs']['object']['value'] = $message->getObject();
        $formConfig['inputs']['message']['value'] = $message->getMessage();
        $formConfig['inputs']['firstname']['value'] = $message->getFirstname();
        $formConfig['inputs']['lastname']['value'] = $message->getLastname();
        $formConfig['inputs']['email']['value'] = $message->getEmail();
        $formConfig['inputs']['categorie']['value'] = $message->getCategorie();
        var_dump($formConfig);
        $form->setConfig($formConfig); // Définir la nouvelle configuration du formulaire
    
        $view->assign('message', $message);
        $view->assign('form', $form->getConfig());
        $view->render();
    }
    

    

    public function storeAction(): void
    {
        $message = $this->getRequest()->getPost();

        $messageModel = new Message();
        $messageModel->setObject($message->object);
        $messageModel->setMessage($message->message);
        $messageModel->setFirstname($message->firstname);
        $messageModel->setLastname($message->lastname);
        $messageModel->setEmail($message->email);
        $messageModel->setCategorie($message->categorie);
        $messageModel->save();

        header('Location: /admin/message/list');
        exit();
    }

    public function deleteAction($id): void
    {
        $messageModel = Message::find($id);

        if ($messageModel) {
            $messageModel->delete();
        }

        header('Location: /admin/message/list');
        exit();
    }

    public function editAction($id): void
    {
        $view = new View('message/back/edit', 'back');
        $view->assign('message', Message::find($id));
        $form = new Edit();
        $view->assign('form', $form->getConfig());
        $view->render();
    }

    public function updateAction(): void
    {
    }

    public function createFrontAction(): void
    {
        $view = new View('message/front/create', 'front');
        $form = new CreateFront();
        $view->assign('form', $form->getConfig());
        $view->render();
    }

    public function detailAction($id): void
    {
        $view = new View('message/back/detail', 'back');
        $view->assign('messages', Message::find($id));
        $view->render();
    }

    public function storeFrontAction(): void
    {
        $message = $this->getRequest()->getPost();

        $messageModel = new Message();
        $messageModel->setObject($message->object);
        $messageModel->setMessage($message->message);
        $messageModel->setFirstname($message->firstname);
        $messageModel->setLastname($message->lastname);
        $messageModel->setEmail($message->email);
        $messageModel->setCategorie($message->categorie);
        $messageModel->save();

        header('Location: /');
        exit();
    }
}