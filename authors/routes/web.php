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


$router->group(['prefix' => 'api'], function() use ($router){

    $router->post('register', 'UserController@register');
    $router->post('login', 'UserController@login');
    
    $router->group(['middleware' => 'auth'], function() use ($router){
        $router->post('logout', 'UserController@logout');
        $router->get('authors', 'AuthorController@index');
        $router->get('authors/{id}','AuthorController@show');
        $router->post('authors', 'AuthorController@store');
        $router->delete('authors/{id}', 'AuthorController@delete');
        $router->put('authors/{id}', 'AuthorController@update');
    });
});
