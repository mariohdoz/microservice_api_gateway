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

$router->group(['middleware' => 'client.credentials'], function($router){

    //---------------------------------------------//
    //- Rutas asociadas a la el servicio de autor -//
    //---------------------------------------------//
    $router->get('/authors', 'AuthorController@index');
    $router->post('/authors', 'AuthorController@store');
    $router->get('/authors/{author}', 'AuthorController@show');
    $router->put('/authors/{author}', 'AuthorController@update');
    $router->patch('/authors/{author}', 'AuthorController@update');
    $router->delete('/authors/{author}', 'AuthorController@destroy');

    //---------------------------------------------//
    //- Rutas asociadas a la el servicio de libro -//
    //---------------------------------------------//
    $router->get('/books', 'BookController@index');
    $router->post('/books', 'BookController@store');
    $router->get('/books/{book}', 'BookController@show');
    $router->put('/books/{book}', 'BookController@update');
    $router->patch('/books/{book}', 'BookController@update');
    $router->delete('/books/{book}', 'BookController@destroy');

    //-----------------------------------------------//
    //- Rutas asociadas a la el servicio de usuario -//
    //-----------------------------------------------//
    $router->get('/users', 'UserController@index');
    $router->post('/users', 'UserController@store');
    $router->get('/users/{users}', 'UserController@show');
    $router->put('/users/{users}', 'UserController@update');
    $router->patch('/users/{users}', 'UserController@update');
    $router->delete('/users/{users}', 'UserController@destroy');

});

//----------------------------------------------------//
//- Rutas Protegidas por las credenciales de usuario -//
//----------------------------------------------------//
$router->group(['middleware' => 'auth:api'], function($router){
    $router->get('/users/me', 'UserController@me');
});


