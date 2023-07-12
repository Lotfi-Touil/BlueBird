<?php

function view(string $view, string $template, array $data = [], array $scripts = []): void
{
    $viewInstance = new App\Core\View($view, $template);
    foreach ($data as $key => $value) {
        $viewInstance->assign($key, $value);
    }
    foreach ($scripts as $script) {
        $viewInstance->addScript($script);
    }
    $viewInstance->render();
}

function isConnected(): bool
{
    return isset($_SESSION['login']);
}

function onProd(): bool
{
    return true;
}

function getBaseUrl(): string
{
    if (onProd()) {
        return 'https://bluebird.lotfitouil.fr';
    } else {
        return 'http://localhost:8081';
    }
}

function redirectHome(): void
{
    header('Location: /');
    exit();
}

function cameltoSnakeCase($str): string
{
    return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
}

function snakeToCamelCase($str): string
{
    return str_replace('_', '', ucwords($str, '_'));
}

function generateSlug($string)
{
    // Remplace les caractères spéciaux et les espaces par des tirets
    $slug = preg_replace('/[^a-zA-Z0-9-]/', '-', $string);

    // Convertit en minuscules
    $slug = strtolower($slug);

    // Supprime les tirets en double
    $slug = preg_replace('/-+/', '-', $slug);

    // Supprime les tirets au début et à la fin
    $slug = trim($slug, '-');

    return $slug;
}
