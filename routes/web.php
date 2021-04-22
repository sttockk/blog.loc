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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store')->name('profile.store');
    Route::post('/comment', 'CommentController@store');
    Route::get('/logout', 'AuthController@logout');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');
    Route::get('/login', 'AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');
    Route::get('/reload-captcha', 'CaptchaValidationController@reloadCaptcha');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::get('/category/{slug}', 'CategoryController@show')->name('categories.single');
Route::get('/tag/{slug}', 'TagController@show')->name('tags.single');
Route::get('/search', 'SearchController@index')->name('search');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'MainController@index')->name('admin.index');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');
    Route::resource('/posts', 'PostController');
    Route::resource('/users', 'UserController');
    Route::get('/users/toggleAdmin/{id}', 'UserController@toggleAdmin');
    Route::get('/users/toggleBan/{id}', 'UserController@toggleBan');
    Route::get('/comments', 'CommentController@index')->name('comments.index');
    Route::get('/comments/toggle/{id}', 'CommentController@toggle');
    Route::delete('/comments/{id}/destroy',
        'CommentController@destroy')->name('comments.destroy');
});

