<?php



Route::get('/welcome', 'LoginController@welcome')->name('welcome');


Route::get('/', 'PostController@index');

Route::get('/posts/{post}', ['as' => 'single-post', 'uses' => 'PostController@show']);//nejmovanje rute, sa single-post mozemo kasnije da pozovemo ovu rutu iz blejdova. Ovo je korisno ako je link jako dugacak.

Route::get('/posts', 'PostController@create');

Route::post('posts', 'PostController@store');

Route::post('posts/{postId}/comments','CommentController@store');

Route::get('/register', 'RegisterController@create');

Route::post('/register', 'RegisterController@store')->middleware('age');//ovo zelimo da zastitimo sa middleware. CheckAge je nazvan age u Kernel.php. Dakle, ovako aktiviramo midlleware. Za sve ovo nam treba blade forbidden, CheckAge middleware, i modifikacija forme, da prima i age. Middleware je filter, odredjuje ko se moze pustiti a ko ne moze u sajt.

Route::get('/logout', 'LoginController@logout');

Route::get('/login', 'LoginController@create');

Route::post('login', 'LoginController@store');

Route::get('/users/{id}', 'UserController@show');





