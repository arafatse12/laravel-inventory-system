<?php


Route::get('/', function () {
    return view('welcome');
});
// User Crud
Route::get('/user/all', 'UserController@index');
Route::get('/user/show/{userId}', 'UserController@show');
Route::get('/user/{userId}/update', 'UserController@update');
Route::get('/user/{userId}/delete', 'UserController@destroy');

Route::get('/{vue_capture?}',function () {
	    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');





