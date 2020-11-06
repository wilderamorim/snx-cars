<?php


namespace App\Core;


use CoffeeCode\Router\Router;
use League\Plates\Engine;

/**
 * Class Controller
 * @package App\Core
 */
abstract class Controller
{
    /** @var Engine */
    protected $view;

    /** @var Router */
    protected $route;

    /**
     * Controller constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->view = Engine::create(dirname(__DIR__, 2) . '/views/', 'php');
        $this->route = $router;

        //shared view data
        $this->view->addData([
            'route' => $this->route,
            'alert' => (object)filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED),
        ]);
    }
}