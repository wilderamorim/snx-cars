<?php


namespace App\Controllers;


use App\Core\Controller;
use App\Models\Car;
use App\Models\Category;

/**
 * Class WebController
 * @package App\Controllers
 */
class WebController extends Controller
{
    public function home()
    {
        echo $this->view->render('pages/home', [
            'title' => 'Início',
            'cars' => (new Car())->find()->order('id DESC')->fetch(true),
            'brands' => (new Category())->scopeType(Category::TYPE_BRAND)->fetch(true),
        ]);
    }
}