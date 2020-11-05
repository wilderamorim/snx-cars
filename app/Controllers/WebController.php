<?php


namespace App\Controllers;


use App\Core\Controller;

/**
 * Class WebController
 * @package App\Controllers
 */
class WebController extends Controller
{
    public function home()
    {
        echo $this->view->render('pages/home', [
            'title' => 'Início'
        ]);
    }
}