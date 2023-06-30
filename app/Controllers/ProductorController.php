<?php

namespace App\Controllers;

use App\Models\Productor;
use App\Forms\Productor\Create;
use App\Forms\Productor\Edit;
use App\Requests\ProductorRequest;

class PostController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function listAction(): void
    {
        view('productor/back/list', 'back', [
            'productors' => Productor::all()
        ]);
    }

    public function createAction(): void
    {
        $form = new Create();
        view('productor/back/create', 'back', [
            'form' => $form->getConfig()
        ]);
    }

    public function storeAction(): void
    {
        $request = new ProductorRequest();

        if (!$request->createProductor()) {
            view('productor/back/create', 'back', [
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function showAction($id): void
    {
        $productor = Productor::find($id);

        if (!$productor)
            $this->redirectToList();

        view('productor/back/show', 'back', [
            'productor' => $productor
        ]);
    }

    public function editAction($id): void
    {
        $productor = Productor::find($id);

        if (!$productor)
            $this->redirectToList();

        view('productor/back/edit', 'back', [
            'productor' => $productor
        ]);
    }

    public function updateAction($id): void
    {
        $productor = Productor::find($id);

        if (!$productor) {
            $this->redirectToList();
        }

        $request = new ProductorRequest();

        if (!$request->updateProductor($productor)) {
            view('productor/back/edit', 'back', [
                'productor'   => $productor,
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function deleteAction($id): void
    {
        $productor = Productor::find($id);

        if ($productor) {
            $productor->delete();
        }

        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/productor/list');
        exit();
    }
}