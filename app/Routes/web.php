<?php

use App\Controllers\Front\AccountController as FrontAccountController;
use App\Controllers\Back\AccountController as BackAccountController;
use App\Controllers\MainController;
use App\Controllers\AuthController;
use App\Controllers\StatController;
use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\PageController;
use App\Controllers\Front\MessageController as FrontMessageController;
use App\Controllers\Back\MessageController as BackMessageController;
use App\Controllers\Front\MovieController AS FrontMovieController;
use App\Controllers\Back\MovieController AS BackMovieController;
use App\Controllers\Back\CategoryMovieController AS BackCategoryMovieController;
use App\Controllers\Back\ProductorController AS BackProductorController;
use App\Controllers\Front\CommentController as FrontCommentController;
use App\Controllers\Back\CommentController as BackCommentController;
use App\Controllers\Back\CommentReplyController as BackCommentReplyController;
use App\Controllers\ReviewController;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\RoleMiddleware;

/**
 * GET
 */

$router->get('/', MainController::class, 'home');

$router->get('/profile', FrontAccountController::class, 'profile')->middleware(AuthMiddleware::class);
$router->get('/other', FrontAccountController::class, 'other')->middleware(AuthMiddleware::class);

$router->get('/verify-account', FrontAccountController::class, 'verifyAccount')->middleware(AuthMiddleware::class);
$router->get('/resend-activation', FrontAccountController::class, 'resendMail')->middleware(AuthMiddleware::class);
$router->get('/activate-account/{token}', FrontAccountController::class, 'activateAccount');

$router->get('/login', AuthController::class, 'login');
$router->get('/logout', AuthController::class, 'logout')->middleware(AuthMiddleware::class);
$router->get('/register', AuthController::class, 'register');

$router->get('/message', FrontMessageController::class, 'create');

$router->get('/admin/dashboard', StatController::class, 'dashboard')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/user/list', UserController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/create', UserController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/show/{id}', UserController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/edit/{id}', UserController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/post/list', PostController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/create', PostController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/show/{id}', PostController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/edit/{id}', PostController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/comment/list', BackCommentController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/comment/show/{id}', BackCommentController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/comment/edit/{id}', BackCommentController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/comment-reply/list', BackCommentReplyController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/comment-reply/show/{id}', BackCommentReplyController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/comment-reply/edit/{id}', BackCommentReplyController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/message/list', BackMessageController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/create', BackMessageController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/show/{id}', BackMessageController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/edit/{id}', BackMessageController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/page/list', PageController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/page/create', PageController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/page/show/{id}', PageController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/page/edit/{id}', PageController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

/**
 * POST
 */

$router->post('/login', AuthController::class, 'loginProcess');
$router->post('/register', AuthController::class, 'registerProcess');

$router->post('/message/home/store', FrontMessageController::class, 'store');

$router->post('/admin/post/store', PostController::class, 'store')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/post/update/{id}', PostController::class, 'update')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/message/store', BackMessageController::class, 'store')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/message/update/{id}', BackMessageController::class, 'update')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->post('/admin/page/store', PageController::class, 'store')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/page/update/{id}', PageController::class, 'update')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

/**
 * DELETE
 */

// $router->delete('/admin/post/delete/{id}', PostController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
// TODO Lotfi : Pour l'instant en get pour avancer

$router->get('/admin/post/delete/{id}', PostController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/delete/{id}', UserController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/delete/{id}', BackMessageController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/page/delete/{id}', PageController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/movie/delete/{id}', BackMovieController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/category-movie/delete/{id}', BackCategoryMovieController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/productor/delete/{id}', BackProductorController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/comment/delete/{id}', BackCommentController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/comment-reply/delete/{id}', BackCommentReplyController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/review/delete/{id}', ReviewController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
