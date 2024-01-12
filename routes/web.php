<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/api/login', 'AuthController@login');
$router->post('/api/register', 'AuthController@register');

Route::group([
    'prefix' => 'api'
], function ($router) {
    $router->get('/category','CategoryController@index');
    $router->post('/category','CategoryController@store');
    $router->get('/category/{id}','CategoryController@show');
    $router->put('/category/{id}','CategoryController@update');
    $router->delete('/category/{id}','CategoryController@destroy');
});

Route::group([
    'middleware'=>'auth',
    'prefix' => 'api'
], function ($router) {
    $router->post('/logout', 'AuthController@logout');
    $router->post('/refresh', 'AuthController@refresh');
    $router->post('/user-profile', 'AuthController@me');

    $router->get('/task','TaskController@index');
    $router->post('/task','TaskController@store');
    $router->get('/task/{id}','TaskController@show');
    $router->put('/task/{id}','TaskController@update');
    $router->delete('/task/{id}','TaskController@destroy');

    $router->get('/task-category','TaskCategoryController@index');
    $router->post('/task-category','TaskCategoryController@store');
    $router->get('/task-category/{id}','TaskCategoryController@show');
    $router->get('/task-category-by-task-id/{id}','TaskCategoryController@showByTaskId');
    $router->put('/task-category/{id}','TaskCategoryController@update');
    $router->put('/task-category-by-task-id/{id}','TaskCategoryController@updateByTaskId');
    $router->delete('/task-category/{id}','TaskCategoryController@destroy');

    $router->get('/notification','NotificationController@index');
    // $router->post('/notification','NotificationController@store');
    $router->get('/notification/{id}','NotificationController@show');
    $router->delete('/notification/{id}','NotificationController@destroy');
});
