<?php

require __DIR__ . '/vendor/autoload.php';


$route = new \CoffeeCode\Router\Router(SITE_URL, '@');
$route->namespace('App\Controllers');

/*
 * WEB ROUTES
 */
require __DIR__ . '/routes/web.php';

/*
 * PROCESSES
 */
$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}
