<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/task','TaskController@index');
$router->post('/task','TaskController@store');
$router->get('/task/{id}','TaskController@show');
$router->put('/task/{id}','TaskController@update');
$router->delete('/task/{id}','TaskController@destroy');

$router->get('/category','CategoryController@index');
$router->post('/category','CategoryController@store');
$router->get('/category/{id}','CategoryController@show');
$router->put('/category/{id}','CategoryController@update');
$router->delete('/category/{id}','CategoryController@destroy');

$router->get('/task-category','TaskCategoryController@index');
$router->post('/task-category','TaskCategoryController@store');
$router->get('/task-category/{id}','TaskCategoryController@show');
$router->put('/task-category/{id}','TaskCategoryController@update');
$router->delete('/task-category/{id}','TaskCategoryController@destroy');

$router->get('/notification','NotificationController@index');
$router->post('/notification','NotificationController@store');
$router->get('/notification/{id}','NotificationController@show');
$router->delete('/notification/{id}','NotificationController@destroy');
