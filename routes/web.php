<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/productos', 'ProductsController@index');
$router->get('/productos/{$id}', 'ProductsController@getProduct');
$router->post('/productos', 'ProductsController@createProduct');
$router->post('/productos/{$id}', 'ProductsController@updateProduct');
$router->delete('/productos/{$id}', 'ProductsController@deleteProduct');