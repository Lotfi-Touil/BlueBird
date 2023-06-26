<?php

use App\Controllers\AccountController;
use App\Controllers\MainController;
use App\Controllers\AuthController;
use App\Controllers\StatController;
use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\MessageController;


use App\Middlewares\AuthMiddleware;
use App\Middlewares\RoleMiddleware;

$router = \App\Core\Router::getInstance();

/**
 * GET
 */
$router->get('/', MainController::class, 'home');
$router->get('/profile', AccountController::class, 'profile')->middleware(AuthMiddleware::class);
$router->get('/other', AccountController::class, 'other')->middleware(AuthMiddleware::class);
$router->get('/login', AuthController::class, 'login');
$router->get('/logout', AuthController::class, 'logout')->middleware(AuthMiddleware::class);
$router->get('/register', AuthController::class, 'register');

/* Admin Routes */
$router->get('/admin/dashboard', StatController::class, 'dashboard')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/list', UserController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/list', PostController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/create', PostController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/edit/{id}', PostController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/message', MessageController::class, 'createFront');
$router->get('/admin/message/list', MessageController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/create', MessageController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/show/{id}', MessageController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/edit/{id}', MessageController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/detail/{id}', MessageController::class, 'detail')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

/**
 * POST
 */
$router->post('/login', AuthController::class, 'login');
$router->post('/register', AuthController::class, 'register');
$router->post('/admin/post/store', PostController::class, 'store')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/post/update/{id}', PostController::class, 'update')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/message/store', MessageController::class, 'store')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/message/update/{id}', MessageController::class, 'update')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/storeFront', MessageController::class, 'storeFront')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

/**
 * DELETE
 */
// $router->delete('/admin/post/delete/{id}', PostController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
// Pour l'instant en get pour avancer
$router->get('/admin/post/delete/{id}', PostController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/message/delete/{id}', MessageController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
