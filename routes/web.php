<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index') -> name('index');

Route::get('/posts', 'PostController@index') -> name('posts.index');
Route::get('/posts/{category}', 'PostController@indexForCategory') -> name('posts.indexForCategory');
Route::get('/posts/tag/{tag}', 'PostController@indexForTag') -> name('posts.indexForTag');
Route::get('/posts/{category}/{post}', 'PostController@show') -> name('posts.show');

Auth::routes(['register' => false]); // pacchetto laravel UI (registrazione disabilitata)

Route::namespace('Admin') -> prefix('admin') -> name('admin.') -> middleware('auth') -> group(function() {
    // rotta dashboard
    Route::get('/', 'HomeController@index') -> name('index');
    Route::post('/get-token', 'HomeController@getToken') -> name('get_token');

    // rotte Posts
    Route::resource('/posts', 'PostController');

    // rotte Categories
    Route::resource('/categories', 'CategoryController');
});
