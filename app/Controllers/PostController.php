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
            'posts' => Post::all()
        ]);
    }

    public function createAction(): void
    {
        $form = new Create();
        view('post/create', 'back', [
            'form' => $form->getConfig()
        ]);
    }

    public function storeAction(): void
    {
        $post = $this->getRequest()->getPost();

        $postModel = new Post();
        $postModel->setTitle($post->title);
        $postModel->setContent($post->content);
        $postModel->create();

        $this->redirectToList();
    }

    public function showAction($id): void
    {
        // TODO
        $this->redirectToList();
    }

    public function editAction($id): void
    {
        $post = Post::find($id);

        if (!$post)
            $this->redirectToList();

        $form = new Edit();
        view('post/edit', 'back', [
            'post' => $post,
            'form' => $form->getConfig()
        ]);
    }

    public function updateAction(): void
    {
        // TODO
        $this->redirectToList();
    }

    public function deleteAction($id): void
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
        }

        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/post/list');
        exit();
    }
}