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
use App\Models\Dish;


$router->get('/', function () use ($router) {
    return $router->app->version();
//    $router->group(['prefix' => 'customer'], function () use ($router) {
//        $router->get('/', ['uses' => 'CustomerController@getAll']);
//        $router->get('/{id}', ['uses' => 'CustomerController@getOne']);
//        $router->post('/', ['uses' => 'CustomerController@addOne']);
//        $router->put('/{id}', ['uses' => 'CustomerController@updateOne']);
//        $router->delete('/{id}', ['uses' => 'CustomerController@removeOne']);
//    });
//    $router->group(['prefix' => 'dish'], function () use ($router) {
//        $router->get('/', ['uses' => 'DishController@getAll']);
//        $router->get('/{id}', ['uses' => 'DishController@getOne']);
//        $router->post('/', ['uses' => 'DishController@addOne']);
//        $router->put('/{id}', ['uses' => 'DishController@updateOne']);
//        $router->delete('/{id}', ['uses' => 'DishController@removeOne']);
//    });
//    $router->group(['prefix' => 'order'], function () use ($router) {
//        $router->get('/', ['uses' => 'OrderController@getAll']);
//        $router->get('/{id}', ['uses' => 'OrderController@getOne']);
//        $router->get('/currentOrder', ['uses' => 'OrderController@currentOrder']);
//        $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@addDishToOne']);
//        $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@removeDishToOne']);
//        $router->post('/cancelOrder', ['uses' => 'OrderController@cancelOrder']);
//    });
});
$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});


$router->get('dish/all', 'DishController@getAll');
$router->get('customer/all', 'CustomerController@getAll');
$router->get('order/{userId}/last', 'OrderController@last');
//$router->get('/dish', function() {
//    return Dish::all();
//    return json_encode(Dish::all());
//    return response()->json([
//        'status' => 200,
//        'values' => Dish::all(),
//    ]);
//});


//$router->get('/user/{id}', function() use ($id) {
//    return Dish::all();
//    return json_encode(Dish::all());
//    return response()->json([
//        'status' => 200,
//        'values' => \App\Models\User::where('id', '=', $id)->first(),
//    ]);
//});

//$router->get('/', function () use ($router) {
////    return $router->app->version();
//    $router->group(['prefix' => 'customer'], function () use ($router) {
//        $router->get('/', ['uses' => 'CustomerController@getAll']);
//        $router->get('/{id}', ['uses' => 'CustomerController@getOne']);
//        $router->post('/', ['uses' => 'CustomerController@addOne']);
//        $router->put('/{id}', ['uses' => 'CustomerController@updateOne']);
//        $router->delete('/{id}', ['uses' => 'CustomerController@removeOne']);
//    });
//    $router->group(['prefix' => 'dish'], function () use ($router) {
//        $router->get('/', ['uses' => 'DishController@getAll']);
//        $router->get('/{id}', ['uses' => 'DishController@getOne']);
//        $router->post('/', ['uses' => 'DishController@addOne']);
//        $router->put('/{id}', ['uses' => 'DishController@updateOne']);
//        $router->delete('/{id}', ['uses' => 'DishController@removeOne']);
//    });
//    $router->group(['prefix' => 'order'], function () use ($router) {
//        $router->get('/', ['uses' => 'OrderController@getAll']);
//        $router->get('/{id}', ['uses' => 'OrderController@getOne']);
//        $router->get('/currentOrder', ['uses' => 'OrderController@currentOrder']);
//        $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@addDishToOne']);
//        $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@removeDishToOne']);
//        $router->post('/cancelOrder', ['uses' => 'OrderController@cancelOrder']);
//    });
//});
//
//
//$router->group(['prefix' => 'customer'], function () use ($router) {
//    $router->get('/', ['uses' => 'CustomerController@getAll']);
//    $router->get('/{id}', ['uses' => 'CustomerController@getOne']);
//    $router->post('/', ['uses' => 'CustomerController@addOne']);
//    $router->put('/{id}', ['uses' => 'CustomerController@updateOne']);
//    $router->delete('/{id}', ['uses' => 'CustomerController@removeOne']);
//});
//$router->group(['prefix' => 'dish'], function () use ($router) {

//    $router->get('/all', ['uses' => 'DishController@getAll']);
//    $router->get('/{id}', ['uses' => 'DishController@getOne']);
//    $router->post('/', ['uses' => 'DishController@addOne']);
//    $router->put('/{id}', ['uses' => 'DishController@updateOne']);
//    $router->delete('/{id}', ['uses' => 'DishController@removeOne']);
//});
//$router->group(['prefix' => 'order'], function () use ($router) {
//    $router->get('/', ['uses' => 'OrderController@getAll']);
//    //create an order => OK || KO
//    $router->post('/', ['uses' => 'OrderController@addOrder']);
//    $router->get('/{id}', ['uses' => 'OrderController@getOne']);
//
//    //TODO : main command
//    $router->get('/currentOrder', ['uses' => 'OrderController@currentOrder']); //find or create
//    $router->post('/{idCustomer}/{idDish}', ['uses' => 'OrderController@addDish']);
//    $router->post('/{idCustomer}/endCommand', ['uses' => 'OrderController@removeOneDish']);
//
//    $router->post('/cancelOrder', ['uses' => 'OrderController@cancelOrder']);
//    $router->post('/{idCustomer}/{idOrder}/{idDish}', ['uses' => 'OrderController@removeOneDish']);
//    $router->post('/{idCustomer}/', ['uses' => 'OrderController@removeOneDish']);
//});
/*
prfix url :order
1) post url:"/" crée une comande et archive la dernière commande || reset
2) get url:"/currentOrder" prend la denière comande et en crée si n'existe pas  || last or create
    -> return code + idOrder
3) post url:"/{idCustomer}/{idOrder}/{idDish}" add one dish
*/
