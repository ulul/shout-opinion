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
	Route::get('/edit-profile/{username}', 'UserController@formEditUser')
		->name('user.edit.profile');
	Route::put('/edit-profile/{username}', 'UserController@update')->name('user.edit.profile');
});

Route::prefix('/admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin.home');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('/manage-user', 'AdminController@manageUser')->name('admin.manage.user');	
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/manage-opinion', 'AdminController@manageOpinion')->name('admin.manage.opinion');
	Route::get('/delete-user/{username}', 'AdminController@deleteUser')
		->name('admin.delete.user');
	Route::get('/activate-user/{username}', 'AdminController@activateUser')
		->name('admin.activate.user');	
});

Route::prefix('/comment')->group(function(){
	Route::post('/store/{post_id}', 'CommentController@store')->name('comment.store');
});

Route::prefix('/opinion')->group(function(){
	Route::get('/', 'PostController@index')->name('post.index');
	Route::post('/store', 'PostController@store')->name('post.store');
	Route::put('/save/{id}', 'PostController@save')->name('post.save');
	Route::get('/create', 'PostController@create')->name('post.create');
	Route::get('/edit/{slug}', 'PostController@edit')->name('post.edit');
	Route::get('/detail/{slug}', 'PostController@detail')->name('post.detail');
	Route::get('/category/{slug}', 'PostController@opinionByCategory')->name('opinion.category');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
	\UniSharp\LaravelFilemanager\Lfm::routes();
});
