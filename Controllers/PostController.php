<?php

namespace App\Controllers;

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
        view('post/list', 'back', [
            'posts', Post::all()
        ]);
    }

    public function createAction(): void
    {
        $form = new Create();
        view('post/create', 'back', [
            'form', $form->getConfig()
        ]);
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
        $postModel->create();

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
        $form = new Edit();
        view('post/edit', 'back', [
            'post' => Post::find($id),
            'form', $form->getConfig()
        ]);
    }

    public function updateAction(): void
    {

    }
}