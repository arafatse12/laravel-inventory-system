<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');



});
// User Crud
Route::get('userSearch', 'Api\SearchUserController@index');

// category
Route::apiResource('/category','Api\CategoryController');
// product
Route::apiResource('/product','Api\ProductController');




