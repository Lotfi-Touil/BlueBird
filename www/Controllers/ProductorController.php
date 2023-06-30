<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Productor;
use App\Forms\Productor\Create;
use App\Forms\Productor\Edit;
use App\Forms\Productor\Show;

class ProductorController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function listAction(): void
    {
        $view = new View('productor/back/list', 'back');
        $view->assign('productors', Productor::all());
        $view->render();
    }

    public function createAction(): void
    {
        $view = new View('productor/back/create', 'back');
        $form = new Create();
        $view->assign('form', $form->getConfig());
        $view->render();
    }

    public function storeAction(): void
    {
        $productor = $this->getRequest()->getPost();

        $productorModel = new Productor();
        $productorModel->setName($productor->name);
        $productorModel->setDescription($productor->description);
        $productorModel->save();

        header('Location: /admin/productor/list');
        exit();
    }

    public function deleteAction($id): void
    {
        $productorModel = Productor::find($id);

        if ($productorModel) {
            $productorModel->delete();
        }

        header('Location: /admin/productor/list');
        exit();
    }

    public function editAction($id): void
    {
        $view = new View('productor/back/edit', 'back');
        $view->assign('productor', Productor::find($id));
        $form = new Edit();
        $view->assign('form', $form->getConfig());
        $view->render();
    }

    public function updateAction($id): void
    {
        $productorModel = Productor::find($id);

        if($productorModel){
            $productorModel->update();
        }

        header('Location: /admin/productor/list');
        exit();
    }

    public function showAction($id): void
    {
        $view = new View('productor/back/show', 'back');
        $view->assign('productor', Productor::find($id));
        $form = new Show();
        $view->assign('form', $form->getConfig());
        $view->render();
    }
}