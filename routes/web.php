<?php


/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PostController@index');

Route::get('/posts/{post}', 'PostController@show');


