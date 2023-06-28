<?php

namespace App;

use App\Core\Router;
use App\Errors\ErrorHandler;

require 'includes/functions.php';
require 'config/config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

spl_autoload_register(function ($class) {
    $file     = str_replace(["App\\", "\\"], ["", "/"], $class);
    $fileForm = $file.".form.php";
    $file     = $file.".php";

    if (file_exists($file)) {
        include $file;
    } else if (file_exists($fileForm)) {
        include $fileForm;
    }
});

set_exception_handler([ErrorHandler::class, 'handle']);

try {
    $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
    $uri = htmlspecialchars($uri, ENT_QUOTES, 'UTF-8');

    if (!file_exists(PUBLIC_ROUTES_FILENAME) || !file_exists(USER_ROUTES_FILENAME) || !file_exists(ADMIN_ROUTES_FILENAME)){
        throw new \App\Exceptions\FileNotFoundException("Le fichier n'éxiste pas.");
    }

    $router = Router::getInstance();

    require 'routes/web.php';
    require 'routes/api.php';

    $router->resolve();

} catch (\Exception $e) {
    ErrorHandler::handle($e);
}