<?php

namespace App\Controllers;

use App\Core\View;
use App\Utils\Auth as UtilsAuth;
use App\Forms\ContactForm;
use \App\Models\Contact;

class Main extends Controller
{

    public function home()
    {
        $view = new View('Main/home', 'front');
        $view->assign('isConnected', UtilsAuth::isConnected());
    }

    public function contact(): void
    {
        $form = new ContactForm();
        $view = new View('Contact/contact-front', 'contact');
        $view->assign('form', $form->getConfig());
        $view->assign('isConnected', UtilsAuth::isConnected());
        $view->assign('title', 'Blue Bird | Contact');

        if ($form->isSubmited() && $form->isValid()) {
            $post = $this->getRequest()->getPost();
            $message = new Contact();
            $message->setObject($post->object);
            $message->setMessage($post->message);
            $message->setFirstname($post->firstname);
            $message->setLastname($post->lastname);
            $message->setEmail($post->email);
            $message->setCategorie($post->categorie);
            $message->save();
            header('Location: /');
        }
        $view->assign("formErrors", $form->errors);
    }

    public function contactList()
    {
        $contactModel = new Contact();
        $contacts = $contactModel->getAll();
        $view = new View('Contact/contact-list', 'back');
        $view->assign('rowsContactList', $contacts);
    }

    public function contactDetails()
    {
        $contactModel = new Contact();
        $contactId = $_GET['id'];
        $infoContact = $contactModel->getById($contactId);
        $view = new View('Contact/contact-details', 'back');
        $view->assign('infoContact', $infoContact);
    }

}
