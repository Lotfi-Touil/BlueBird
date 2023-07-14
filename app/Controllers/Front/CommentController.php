<?php

namespace App\Controllers\Front;

use App\Controllers\Controller;
use App\Requests\CommentRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function storeAction(): void
    {
        $request = new CommentRequest();

        if (!$request->addComment()) {
            $errors = $request->getErrors();
            $response['success'] = false;
            $response['errors'] = $errors;
        } else {
            $response['success'] = true;
            $response['message'] = 'Le commentaire a été ajouté avec succès.';
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}