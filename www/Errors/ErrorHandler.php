<?php
namespace App\Errors;

use App\Core\View;

class ErrorHandler
{
    public static function handle($errorCode)
    {
        http_response_code($errorCode);

        $viewPath = '';
        switch ($errorCode) {
            case HTTP_NOT_FOUND:
                $viewPath = 'Error/not-found';
                $title = 'Page non trouvée';
                break;
            case HTTP_INTERNAL_SERVER_ERROR:
                $viewPath = 'Error/internal-server-error';
                $title = 'Erreur interne du serveur';
                break;
            default:
                $viewPath = 'Error/unknown-error';
                $title = 'Erreur inconnue';
                break;
        }

        $view = new View($viewPath, 'front');
        $view->assign('title', $title);
    }
}
