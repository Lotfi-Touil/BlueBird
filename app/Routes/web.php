<?php

use App\Controllers\AccountController;
use App\Controllers\MainController;
use App\Controllers\AuthController;
use App\Controllers\StatController;
use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\PageController;

use App\Middlewares\AuthMiddleware;
use App\Middlewares\RoleMiddleware;

/**
 * GET
 */

$router->get('/', MainController::class, 'home');

$router->get('/profile', AccountController::class, 'profile')->middleware(AuthMiddleware::class);
$router->get('/other', AccountController::class, 'other')->middleware(AuthMiddleware::class);

$router->get('/verify-account', AccountController::class, 'verifyAccount')->middleware(AuthMiddleware::class);
$router->get('/resend-activation', AccountController::class, 'resendMail')->middleware(AuthMiddleware::class);
$router->get('/activate-account/{token}', AccountController::class, 'activateAccount');

$router->get('/login', AuthController::class, 'login');
$router->get('/logout', AuthController::class, 'logout')->middleware(AuthMiddleware::class);
$router->get('/register', AuthController::class, 'register');

$router->get('/admin/dashboard', StatController::class, 'dashboard')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/user/list', UserController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/create', UserController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/show/{id}', UserController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/edit/{id}', UserController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/post/list', PostController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/create', PostController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/show/{id}', PostController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/post/edit/{id}', PostController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/page/list', PageController::class, 'list')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/page/create', PageController::class, 'create')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/page/show/{id}', PageController::class, 'show')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/page/edit/{id}', PageController::class, 'edit')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

/**
 * POST
 */
$router->post('/login', AuthController::class, 'loginProcess');
$router->post('/register', AuthController::class, 'registerProcess');

$router->post('/admin/post/store', PostController::class, 'store')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/post/update/{id}', PostController::class, 'update')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->post('/admin/page/store', PageController::class, 'store')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/page/update/{id}', PageController::class, 'update')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->post('/admin/user/store', UserController::class, 'store')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->post('/admin/user/update/{id}', UserController::class, 'update')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

/**
 * DELETE
 */
// $router->delete('/admin/post/delete/{id}', PostController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
// TODO Lotfi : Pour l'instant en get pour avancer

$router->get('/admin/post/delete/{id}', PostController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
$router->get('/admin/user/delete/{id}', UserController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);

$router->get('/admin/page/delete/{id}', PageController::class, 'delete')->middleware(AuthMiddleware::class)->middleware(RoleMiddleware::class, ['admin']);
