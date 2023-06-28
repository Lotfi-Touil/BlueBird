<?php

use App\Controllers\AccountController;
use App\Controllers\MainController;
use App\Controllers\AuthController;
use App\Controllers\StatController;
use App\Controllers\UserController;
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
$router->get('/admin/dashboard', StatController::class, 'dashboard')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user-list', UserController::class, 'userList')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

/**
 * POST
 */
$router->post('/login', AuthController::class, 'login');
$router->post('/register', AuthController::class, 'register');