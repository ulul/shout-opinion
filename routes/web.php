<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about-us', 'HomeController@about')->name('home.about');
Route::get('/disclaimer', 'HomeController@disclaimer')->name('home.disclaimer');
Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('home.privacy');

Route::prefix('/user')->group(function(){
	Route::get('/profile/{username}', 'UserController@profile')->name('user.profile');
});

Route::prefix('/post')->group(function(){
	Route::get('/detail/{slug}', 'PostController@detail')->name('post.detail');
});

Route::prefix('/admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	
});
