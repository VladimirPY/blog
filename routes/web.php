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

Route::get('/about', 'PageController@About')->name('about');

Route::get('/contacts', 'PageController@Contacts')->name('contacts');

Route::get('/services', 'PageController@Services')->name('services');

Route::get('/author/{key}', '\\' . \App\Http\Controllers\PostsByAuthorController::class)->name('posts_by_author');

Route::get('/category/{key}', '\\' . \App\Http\Controllers\PostsByCategoryController::class)->name('posts_by_category');

Route::get('/', 'IndexController@Main')->name('index');

Route::get('/admin', 'AdminController@main')->name('admin');

Route::get('/admin/all', 'AdminAllController@all')->name('admin_all');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/categories', 'AdminAllController@category')->name('admin_category');

Route::get('/admin/add_post', 'Admin_postController@add')->name('add_post_get');

Route::post('/admin/add_post', 'Admin_postController@save')->name('add_post_post');

Route::get('/admin/edit_post/{id}', 'Admin_postController@edit')->name('edit_post_get');

Route::post('/admin/edit_post/{id}', 'Admin_postController@edit_save')->name('edit_post_post');

Route::post('/admin/delete_post', 'Admin_postController@delete')->name('delete_post');

Route::get('/admin/posts', 'AdminAllController@posts')->name('admin_posts');

Route::get('/post/{id}', '\\' . \App\Http\Controllers\SinglePostController::class)->name('single_post');
