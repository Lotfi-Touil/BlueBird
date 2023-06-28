<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Studio as StudioModel;

class Studio extends Controller
{
    //function to display a list of studios
    public function studioList()
    {
        $studioModel = new StudioModel();
        $studios = $studioModel->getAll();

        $view = new View('studio/list', 'back');
        $view->assign('rowsStudio', $studios);
    }
}
