<?php

namespace App\Controllers\Front;

use App\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showAction($id): void
    {
        $post = Post::find($id);
        
        if (!$post)
            $this->redirectToList();

        view('post/front/show', 'front', [
            'post' => $post,
        ]);
    }

    public function listAction(): void
    {
        $posts = Post::all();

        if (!$posts)
            $this->redirectToList();

        view('post/front/list', 'front', [
            'posts' => $posts,
        ]);
    }

    private function redirectToList(): void
    {
        header('Location: /post/list');
        exit();
    }
}