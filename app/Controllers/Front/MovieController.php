<?php

namespace App\Controllers\Front;

use App\Controllers\Controller;
use App\Core\QueryBuilder;
use App\Models\Movie;
use App\Models\CategoryMovie;
use App\Models\Comment;
use App\Models\CommentReply;

class MovieController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showAction($id): void
    {
        $movie = Movie::find($id);
        if (!$movie)
            redirectHome();

        $movieCategoriesMovie = QueryBuilder::table('movie_category_movie')
            ->select()
            ->where('id_movie', $id)
            ->get();
        $movieCategoriesMovie = array_values(array_column($movieCategoriesMovie, 'id_category_movie'));

        $alias = [
            'user_comment',
            'user_reply'
        ];

        $commentRows = QueryBuilder::table('comment')
            ->select([
                'comment.id AS id_comment',
                'comment.*',
                'comment_reply.id AS id_reply',
                'comment_reply.content AS reply_content',
                'comment_reply.created_at AS reply_date',
                'user_comment.firstname AS firstname_comment',
                'user_comment.lastname AS lastname_comment',
                'user_reply.firstname AS firstname_reply',
                'user_reply.lastname AS lastname_reply'
            ], $alias)
            ->join('comment_reply', 'comment.id', '=', 'comment_reply.id_comment')
            ->join('user', 'comment.id_user', '=', 'user_comment.id', 'user_comment')
            ->join('user', 'comment_reply.id_user', '=', 'user_reply.id', 'user_reply')
            ->where('entity', 'movie')
            ->andWhere('id_entity', $id)
            ->get();

        $comments = [];

        foreach ($commentRows as $row) {
            $commentId = $row['id_comment'];

            // commentaire
            if (!isset($comments[$commentId])) {
                $comment = new Comment();
                $comment->setId($row['id_comment']);
                $comment->setContent($row['content']);
                $comment->setCreatedAt($row['created_at']);
                $comment->setUsername($row['firstname_comment'] . ' ' . $row['lastname_comment']);

                $comments[$commentId] = $comment;
            }

            // éventuelles réponses au commentaire
            if ($row['id_reply']) {
                $reply = new CommentReply();
                $reply->setId($row['id_reply']);
                $reply->setContent($row['reply_content']);
                $reply->setCreatedAt($row['reply_date']);
                $reply->setUsername($row['firstname_reply'] . ' ' . $row['lastname_reply']);

                $comments[$commentId]->addReply($reply);
            }
        }

        $userId = QueryBuilder::table('user')
            ->select(['id'])
            ->where('email', $_SESSION['login'] ?? '')
            ->getColumn('id');

        view('movie/front/show', 'front', [
            'movie' => $movie,
            'movieCategoriesMovie' => $movieCategoriesMovie,
            'categoriesMovie' => CategoryMovie::all(),
            'isConnected' => isConnected(),
            'idUser' => $userId,
            'comments' => $comments
        ]);
    }
}