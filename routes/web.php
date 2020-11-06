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
$route->get('/{car}/edit', 'CarController@edit', 'web.cars.edit');
$route->put('/{car}', 'CarController@update', 'web.cars.update');
$route->delete('/{car}', 'CarController@destroy', 'web.cars.destroy');

/*
 * FILTER
 */
$route->get('/busca/{brand}/{model}/{year}/{price}/{city}', 'FilterController@search', 'web.filter.search');

$route->group('/filter');
$route->post('/filter', 'FilterController@filter', 'web.filter.filter');
$route->post('/redirect', 'FilterController@redirect', 'web.filter.redirect');
