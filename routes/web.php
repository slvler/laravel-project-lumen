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


$router->post("/register", "UsersController@register");

$router->post("/giris", "UsersController@giris");

$router->group(['middleware' => 'auth'], function () use ($router) {
    
    $router->get("/item", "ItemController@index");
    $router->get("/item/{id}", "ItemController@selectOne");
    $router->post("/add", "ItemController@add");
    $router->put("/update/{id}", "ItemController@update");
    $router->delete("/delete/{id}", "ItemController@delete");


});



