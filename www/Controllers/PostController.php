<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Post;
use App\Forms\Post\Create;
use App\Forms\Post\Edit;

class PostController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function listAction(): void
    {
        $view = new View('post/list', 'back');
        $view->assign('posts', Post::all());
        $view->render();
    }

    public function createAction(): void
    {
        $view = new View('post/create', 'back');
        $form = new Create();
        $view->assign('form', $form->getConfig());
        $view->render();
    }

    public function showAction(): void
    {
        
    }

    public function storeAction(): void
    {
        $post = $this->getRequest()->getPost();

        $postModel = new Post();
        $postModel->setTitle($post->title);
        $postModel->setContent($post->content);
        $postModel->save();

        header('Location: /admin/post/list');
        exit();
    }

    public function deleteAction($id): void
    {
        $postModel = Post::find($id);

        if ($postModel) {
            $postModel->delete();
        }

        header('Location: /admin/post/list');
        exit();
    }

    public function editAction($id): void
    {
        $view = new View('post/edit', 'back');
        $view->assign('post', Post::find($id));
        $form = new Edit();
        $view->assign('form', $form->getConfig());
        $view->render();
    }

    public function updateAction(): void
    {

    }
}