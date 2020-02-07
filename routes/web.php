<?php



Route::get('/welcome', 'LoginController@welcome')->name('welcome');


Route::get('/', 'PostController@index');

Route::get('/posts/{post}', ['as' => 'single-post', 'uses' => 'PostController@show']);//nejmovanje rute, sa single-post mozemo kasnije da pozovemo ovu rutu iz blejdova. Ovo je korisno ako je link jako dugacak.

Route::get('/posts', 'PostController@create');

Route::post('posts', 'PostController@store');

Route::post('posts/{postId}/comments','CommentController@store');

Route::get('/register', 'RegisterController@create');

Route::post('/register', 'RegisterController@store');

Route::get('/logout', 'LoginController@logout');

Route::get('/login', 'LoginController@create');

Route::post('login', 'LoginController@store');





