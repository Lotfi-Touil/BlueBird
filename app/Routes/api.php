<?php

use App\Controllers\Api\DatabaseSetupController;
use App\Controllers\Api\AdminAccountSetupController;

/**
 * API
 */

<<<<<<< develop
$router->get('/api/installation/step1', HomeSetupController::class, 'getStructure');
 
$router->get('/api/installation/step2', DatabaseSetupController::class, 'getStructure');
$router->post('/api/installation/createDatabase', DatabaseSetupController::class, 'createDatabase');

$router->get('/api/installation/step3', AdminAccountSetupController::class, 'getStructure');
$router->post('/api/installation/createUser', AdminAccountSetupController::class, 'createUser');
=======
$router->get('/api/installation/step1', DatabaseSetupController::class, 'getFormStructure');
$router->post('/api/installation/createDatabase', DatabaseSetupController::class, 'createDatabase');

$router->get('/api/installation/step2', AdminAccountSetupController::class, 'getFormStructure');
$router->post('/api/installation/createUser', AdminAccountSetupController::class, 'createUser');
>>>>>>> Installeur JS : V1
