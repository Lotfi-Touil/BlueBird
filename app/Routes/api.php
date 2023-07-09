<?php

use App\Controllers\Api\DatabaseSetupController;
use App\Controllers\Api\AdminAccountSetupController;

/**
 * API
 */

$router->get('/api/installation/step1', DatabaseSetupController::class, 'getFormStructure');
$router->post('/api/installation/createDatabase', DatabaseSetupController::class, 'createDatabase');

$router->get('/api/installation/step2', AdminAccountSetupController::class, 'getFormStructure');
$router->post('/api/installation/createUser', AdminAccountSetupController::class, 'createUser');
