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

$router->get('/testeController', 'ExampleController@show');

$router->group(['prefix' => 'api/v1'], function () use ($router) {
   // ->/api/v1/register
    $router->post('register', 'AuthController@register');

    $router->post('token', 'AuthController@token');
    
    $router->get('/drop', 'AuthController@dropUser');

    // Matches "/api/profile
    $router->get('profile', 'UserController@profile');

    // Matches "/api/users/1 
    //get one user by id
    $router->get('users/{id}', 'UserController@singleUser');

    // Matches "/api/users
    $router->get('users', 'UserController@allUsers');

    // INF 332 17/10/2020
    $router->get('produtos/similares/{CustomerID}', 'SimilarityController@show');
    
    $router->get('produtos/recomendados/{CustomerID}', 'RecomendationController@showRecomendations');

    $router->get('produtos/comprados/{ProductID}', 'RecomendationController@showProducts');

});