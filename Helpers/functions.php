<?php

function view(string $view, string $template, array $data = []): void
{
    $viewInstance = new App\Core\View($view, $template);
    foreach ($data as $key => $value) {
        $viewInstance->assign($key, $value);
    }
    $viewInstance->render();
}

function onProd(): bool
{
    return false;
}

function redirectHome(): void
{
    header('Location: /');
}

function cameltoSnakeCase($str): string
{
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
}

function snakeToCamelCase($str): string
{
    return str_replace('_', '', ucwords($str, '_'));
}
