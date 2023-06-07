<?php

namespace App;

use App\Errors\ErrorHandler;
use \Exception;

require 'config/constants.php';

session_start();

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

try {
    $uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_URL);
    $uri = htmlspecialchars($uri, ENT_QUOTES, 'UTF-8');
    $explodedUri = explode('?', $uri);
    $uri = strtolower(trim($explodedUri[0], '/'));

    if (empty($uri)) {
        $uri = 'default';
    }

    if (!file_exists('routes.yml')){
        throw new Exception("Le fichier n'éxiste pas.", HTTP_INTERNAL_SERVER_ERROR);
    }

    $routes = yaml_parse_file('routes.yml');

    if (empty($routes[$uri])){
        throw new Exception('404 Not Found', HTTP_NOT_FOUND);
    }

    if (empty($routes[$uri]['controller']) || empty($routes[$uri]['action'])){
        throw new Exception("La route n'est pas complète.", HTTP_INTERNAL_SERVER_ERROR);
    }

    $controller = $routes[$uri]['controller'];
    $action = $routes[$uri]['action'];

    $controllerFilePath = 'Controllers/'.$controller.'.php';

    if (!file_exists($controllerFilePath)){
        throw new Exception("Le fichier controller ($controllerFilePath) n'éxiste pas.", HTTP_INTERNAL_SERVER_ERROR);
    } else {
        include $controllerFilePath;

        $controller = "\\App\\Controllers\\".$controller;

        if (!class_exists($controller))
        {
            throw new Exception("La classe du controller ($controllerFilePath) n'éxiste pas.", HTTP_INTERNAL_SERVER_ERROR);
        }

        $objController = new $controller();
        if (method_exists($objController, $action)) {
            $objController->$action();
        } else {
            throw new Exception("La méthode ($action) n'éxiste pas dans le controller ($controller).", HTTP_INTERNAL_SERVER_ERROR);
        }

    }
} catch (Exception $e) {
    // TODO Lotfi : revoir la gestion des erreur SQL
    ErrorHandler::handle($e->getCode());
}