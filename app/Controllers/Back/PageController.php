<?php

namespace App\Controllers\Back;

use App\Controllers\Controller;
use App\Core\File;
use App\Models\Page;
use App\Requests\PageRequest;

class PageController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function uploadImageAction(): void
    {
        $filepath = File::uploadImage(__DIR__ . '/../../resources/uploads/', $_FILES);
        if ($filepath) {
            echo json_encode(['location' => $filepath]);
        } else {
            echo json_encode(['error' => 'Erreur lors de l\'upload de l\'image']);
        }
    }

    public function listAction(): void
    {
        view('page/back/list', 'back', [
            'pages' => Page::all()
        ]);
    }

    public function createAction(): void
    {
        view('page/back/create', 'back');
    }

    public function storeAction(): void
    {
        $request = new PageRequest();

        if (!$request->createPage()) {
            view('page/back/create', 'back', [
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function showAction($id): void
    {
        $page = Page::find($id);

        if (!$page)
            $this->redirectToList();

        view('page/back/show', 'back', [
            'page' => $page
        ]);
    }

    public function editAction($id): void
    {
        $page = Page::find($id);

        if (!$page)
            $this->redirectToList();

        view('page/back/edit', 'back', [
            'page' => $page
        ]);
    }

    public function updateAction($id): void
    {
        $page = Page::find($id);

        if (!$page) {
            $this->redirectToList();
        }

        $request = new PageRequest();

        if (!$request->updatePage($page)) {
            view('page/back/edit', 'back', [
                'page'   => $page,
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function deleteAction($id): void
    {
        $page = Page::find($id);

        if ($page) {
            $page->delete();
        }

        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/page/list');
        exit();
    }
}