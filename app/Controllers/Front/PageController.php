<?php

namespace App\Controllers\Front;

use App\Controllers\Controller;
use App\Exceptions\HttpException;
use App\Models\Page;
use App\Models\TemplateOne;

class PageController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function showAction($slug): void
    {
        $page = TemplateOne::where('slug', $slug);

        if (!$page) {
            throw new HttpException('Page Not Found', 404);
        }

        view('template-one/front/show', 'template-one', [
            'page' => $page
        ]);
    }
}
