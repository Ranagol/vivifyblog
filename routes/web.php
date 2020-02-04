<?php


/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PostController@index');

Route::get('/posts/{post}', ['as' => 'single-post', 'uses' => 'PostController@show']);//nejmovanje rute, sa single-post mozemo kasnije da pozovemo ovu rutu iz blejdova. Ovo je korisno ako je link jako dugacak.

Route::get('/posts', 'PostController@create');

Route::post('posts', 'PostController@store');




