<?php

namespace App;

use \Exception;

spl_autoload_register(function ($class) {
    $file = str_replace(["App\\", "\\"], ["", "/"], $class).".php";
    if (file_exists($file)) {
        include $file;
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
        throw new Exception("Le fichier n'éxiste pas.", 500);
    }

    $routes = yaml_parse_file('routes.yml');

    if (empty($routes[$uri])){
        throw new Exception('404 Not Found', 404);
    }

    if (empty($routes[$uri]['controller']) || empty($routes[$uri]['action'])){
        throw new Exception("La route n'est pas complète.", 500);
    }

    $controller = $routes[$uri]['controller'];
    $action = $routes[$uri]['action'];

    $controllerFilePath = 'Controllers/'.$controller.'.php';
    
    if (!file_exists($controllerFilePath)){
        throw new Exception("Le fichier controller ($controllerFilePath) n'éxiste pas.", 500);
    } else {
        include $controllerFilePath;

        $controller = "\\App\\Controllers\\".$controller;
        if (!class_exists($controller))
        {
            throw new Exception("La classe du controller ($controllerFilePath) n'éxiste pas.", 500);
        }

        $objController = new $controller();

        if (method_exists($objController, $action)) {
            $objController->$action();
        } else {
            throw new Exception("La méthode ($action) n'éxiste pas dans le controller ($controller).", 500);
        }

    }
} catch (Exception $e) {
    http_response_code($e->getCode());
    echo "Erreur {$e->getCode()}";
}