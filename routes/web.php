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

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\OrderController;

$router->get('/', function () use ($router) {
//    return $router->app->version();
    $router->group(['prefix' => 'customer'], function () use ($router) {
        $router->get('/', ['uses' => 'CustomerController@getAll']);
        $router->get('/{id}', ['uses' => 'CustomerController@getOne']);
        $router->post('/', ['uses' => 'CustomerController@addOne']);
        $router->put('/{id}', ['uses' => 'CustomerController@updateOne']);
        $router->delete('/{id}', ['uses' => 'CustomerController@removeOne']);
    });
    $router->group(['prefix' => 'dish'], function () use ($router) {
        $router->get('/', ['uses' => 'DishController@getAll']);
        $router->get('/{id}', ['uses' => 'DishController@getOne']);
        $router->post('/', ['uses' => 'DishController@addOne']);
        $router->put('/{id}', ['uses' => 'DishController@updateOne']);
        $router->delete('/{id}', ['uses' => 'DishController@removeOne']);
    });
    $router->group(['prefix' => 'order'], function () use ($router) {
        $router->get('/', ['uses' => 'OrderController@getAll']);
        $router->get('/{id}', ['uses' => 'OrderController@getOne']);
        $router->get('/currentOrder', ['uses' => 'OrderController@currentOrder']);
        $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@addDishToOne']);
        $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@removeDishToOne']);
        $router->post('/cancelOrder', ['uses' => 'OrderController@cancelOrder']);
    });
});

$router->group(['prefix' => 'customer'], function () use ($router) {
    $router->get('/', ['uses' => 'CustomerController@getAll']);
    $router->get('/{id}', ['uses' => 'CustomerController@getOne']);
    $router->post('/', ['uses' => 'CustomerController@addOne']);
    $router->put('/{id}', ['uses' => 'CustomerController@updateOne']);
    $router->delete('/{id}', ['uses' => 'CustomerController@removeOne']);
});
$router->group(['prefix' => 'dish'], function () use ($router) {
    $router->get('/', ['uses' => 'DishController@getAll']);
    $router->get('/{id}', ['uses' => 'DishController@getOne']);
    $router->post('/', ['uses' => 'DishController@addOne']);
    $router->put('/{id}', ['uses' => 'DishController@updateOne']);
    $router->delete('/{id}', ['uses' => 'DishController@removeOne']);
});
$router->group(['prefix' => 'order'], function () use ($router) {
    $router->get('/', ['uses' => 'OrderController@getAll']);
    $router->get('/{id}', ['uses' => 'OrderController@getOne']);
    $router->get('/currentOrder', ['uses' => 'OrderController@currentOrder']);
    $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@addDishToOne']);
    $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@removeDishToOne']);
    $router->post('/cancelOrder', ['uses' => 'OrderController@cancelOrder']);
});
