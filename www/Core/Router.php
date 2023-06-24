<?php

namespace App\Core;

use App\Exceptions\FileNotFoundException;
use App\Exceptions\HttpException;
use App\Middlewares\AuthMiddleware;
use App\Utils\Auth;

class Router
{
    private $routes;

    public function __construct(array $routesFiles)
    {
        $this->routes = [];
        foreach ($routesFiles as $file) {
            $this->routes = array_merge($this->routes, yaml_parse_file($file));
        }
    }

    public function route($uri)
    {
        $route = $this->findRoute($uri);

        if ($route && isset($route['requires_auth']) && $route['requires_auth']) {
            if (!Auth::isConnected()) {
                header("Location: /login");
                exit;
            }
        }

        if ($route && isset($route['role'])) {
            $requiredRole = $route['role'];
            $authMiddleware = new AuthMiddleware($requiredRole);
            $authMiddleware->handle();
        }

        $this->callAction($route);
    }

    private function findRoute($uri)
    {
        $uri = explode('?', $uri)[0];
        $uri = strtolower(trim($uri, '/'));

        if (empty($uri)) {
            $uri = 'default';
        }

        if (empty($this->routes[$uri])) {
            throw new HttpException('La page n\'éxiste pas.', HTTP_NOT_FOUND);
        }

        if (empty($this->routes[$uri]['controller']) || empty($this->routes[$uri]['action'])) {
            throw new HttpException();
        }

        return $this->routes[$uri];
    }

    private function callAction($route)
    {
        $controller = $route['controller'];
        $action = $route['action'];

        $controllerFilePath = 'Controllers/' . $controller . '.php';

        if (!file_exists($controllerFilePath)) {
            throw new FileNotFoundException();
        } else {
            include $controllerFilePath;

            $controller = "\\App\\Controllers\\" . $controller;

            if (!class_exists($controller)) {
                throw new HttpException();
            }

            $objController = new $controller();
            if (method_exists($objController, $action)) {
                $objController->$action();
            } else {
                throw new HttpException();
            }
        }

    }
}
