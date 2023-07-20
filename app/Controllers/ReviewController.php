<?php

namespace App\Controllers;

use App\Core\QueryBuilder;
use App\Models\Review;
use App\Models\User;
use App\Models\Movie;
use App\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listAction(): void
    {
        $reviews = QueryBuilder::table('review')
            ->select('review.*', 'user.firstname', 'user.lastname', 'movie.title')
            ->join('user', 'review.id_user', '=', 'user.id')
            ->join('movie', 'review.id_movie', '=', 'movie.id')
            ->get();

        view('review/back/list', 'back', [
            'reviews' => $reviews
        ]);
    }

    public function createAction(): void
    {
        view(
            'review/back/create',
            'back',
            [
                'users' => User::all(),
                'movies' => Movie::all(),
            ],
            ['/js/review.js'],
            ['/css/back/review.css']
        );
    }

    public function storeAction(): void
    {
        $request = new ReviewRequest();

        if (!$request->createReview()) {
            view(
                'review/back/create',
                'back',
                [
                    'errors' => $request->getErrors(),
                    'old'    => $request->getOld(),
                    'users' => User::all(),
                    'movies' => Movie::all(),
                ],
                ['/js/review.js'],
                ['/css/back/review.css']
            );
        }

        $this->redirectToList();
    }

    public function showAction($id): void
    {
        $review = QueryBuilder::table('review')
            ->select('review.*', 'user.firstname', 'user.lastname', 'movie.title')
            ->join('user', 'review.id_user', '=', 'user.id')
            ->join('movie', 'review.id_movie', '=', 'movie.id')
            ->where('review.id', '=', $id)
            ->first();

        if (!$review)
            $this->redirectToList();

        view('review/back/show', 'back', [
            'review' => $review
        ]);
    }

    public function editAction($id): void
    {
        $review = QueryBuilder::table('review')
            ->select('review.*', 'user.firstname', 'user.lastname', 'movie.title')
            ->join('user', 'review.id_user', '=', 'user.id')
            ->join('movie', 'review.id_movie', '=', 'movie.id')
            ->where('review.id', '=', $id)
            ->first();

        if (!$review)
            $this->redirectToList();

        view(
            'review/back/edit',
            'back',
            [
                'review' => $review,
                'users' => User::all(),
                'movies' => Movie::all(),
            ],
            ['/js/review.js'],
            ['/css/back/review.css']
        );
    }

    public function updateAction($id): void
    {
        $review = QueryBuilder::table('review')
            ->select('review.*', 'review.id as id_review', 'user.firstname', 'user.lastname', 'movie.title')
            ->join('user', 'review.id_user', '=', 'user.id')
            ->join('movie', 'review.id_movie', '=', 'movie.id')
            ->where('review.id', '=', $id)
            ->first();

        if (!$review) {
            $this->redirectToList();
        }

        $request = new ReviewRequest();

        if (!$request->updateReview($review)) {
            view('review/back/edit', 'back', [
                'review'   => $review,
                'errors' => $request->getErrors(),
                'old'    => $request->getOld()
            ]);
        }

        $this->redirectToList();
    }

    public function deleteAction($id): void
    {
        $review = Review::find($id);

        if ($review) {
            $review->delete();
        }

        $this->redirectToList();
    }

    private function redirectToList(): void
    {
        header('Location: /admin/review/list');
        exit();
    }
}