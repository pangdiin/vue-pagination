<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/topics', 'TopicController@index');
Route::get('/users', 'UserController@index');


