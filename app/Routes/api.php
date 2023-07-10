<?php

use App\Controllers\Api\DatabaseSetupController;
use App\Controllers\Api\AdminAccountSetupController;

/**
 * API
 */

$router->get('/api/installation/step1', HomeSetupController::class, 'getStructure');
 
$router->get('/api/installation/step2', DatabaseSetupController::class, 'getStructure');
$router->post('/api/installation/createDatabase', DatabaseSetupController::class, 'createDatabase');

$router->get('/api/installation/step3', AdminAccountSetupController::class, 'getStructure');
$router->post('/api/installation/createUser', AdminAccountSetupController::class, 'createUser');
