<?php

namespace App\Core;

use App\Exceptions\FileNotFoundException;
use App\Exceptions\HttpException;
use App\Middlewares\Middleware;

class Router
{
    private static ?Router $instance = null;

    private array $routes = [];
    private ?Route $currentRoute = null;

    public static function getInstance(): Router
    {
        if (self::$instance === null) {
            self::$instance = new Router();
        }

        return self::$instance;
    }

    public function get(string $uri, string $controller, string $action, array $params = [])
    {
        $this->addRoute($uri, 'GET', $controller, $action, $params);
        return $this;
    }

    public function post(string $uri, string $controller, string $action, array $params = [])
    {
        $this->addRoute($uri, 'POST', $controller, $action, $params);
        return $this;
    }

    public function put(string $uri, string $controller, string $action, array $params = [])
    {
        $this->addRoute($uri, 'PUT', $controller, $action, $params);
        return $this;
    }

    public function patch(string $uri, string $controller, string $action, array $params = [])
    {
        $this->addRoute($uri, 'PATCH', $controller, $action, $params);
        return $this;
    }

    public function delete(string $uri, string $controller, string $action, array $params = [])
    {
        $this->addRoute($uri, 'DELETE', $controller, $action, $params);
        return $this;
    }

    private function addRoute(string $uri, string $method, string $controller, string $action, array $params = []): void
    {
        $route = new Route($uri, $method, $controller, $action, $params);
        $this->routes[] = $route;
        $this->currentRoute = $route;
    }

    public function middleware(string $middleware, array $constructorParams = [], array $handleParams = []): Router
    {
        if ($this->currentRoute) {
            $this->currentRoute->addMiddleware($middleware, $constructorParams, $handleParams);
        }
        return $this;
    }

    public function resolve(): void
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route->match($requestUri, $requestMethod)) {
                $params      = $route->getParams();
                $controller  = $route->getController();
                $action      = $route->getAction();
                $middlewares = $route->getMiddlewares();

                $this->checkControllerValidity($controller);
                $this->runMiddlewares($middlewares);

                $controllerInstance = new $controller();
                if (!method_exists($controllerInstance, $action)) {
                    throw new HttpException();
                }
                call_user_func_array([$controllerInstance, $action], $params);

                return;
            }
        }

        throw new HttpException('Page Not Found', HTTP_NOT_FOUND);
    }

    private function runMiddlewares($middlewares): void
    {
        if ($middlewares) {
            foreach ($middlewares as $middleware) {
                $middlewareClass = $middleware['middleware'];
                $constructorParams = $middleware['constructorParams'];
                $handleParams = $middleware['handleParams'];

                $middlewareInstance = new $middlewareClass(...$constructorParams);
                call_user_func_array([$middlewareInstance, 'handle'], $handleParams);
            }
        }
    }

    private function checkControllerValidity($controller): void
    {
        $controllerParts = explode('\\', $controller);
        $controllerFileName = end($controllerParts);
        $controllerFilePath = 'Controllers/' . $controllerFileName . '.php';
        if (!file_exists($controllerFilePath)) {
            throw new FileNotFoundException();
        }

        if (!class_exists($controller)) {
            throw new HttpException();
        }
    }
}
