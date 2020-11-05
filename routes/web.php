<?php


$route->group(null);
$route->get('/', 'WebController@home', 'web.home');

/*
 * CARS
 */
$route->group('/carros');
$route->get('/', 'CarController@index', 'web.cars.index');
$route->get('/create', 'CarController@create', 'web.cars.create');
$route->post('/', 'CarController@store', 'web.cars.store');
