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



Route::get('/', 'IndexController@Main')->name('home');

Route::get('/about', 'PageController@About')->name('about');

Route::get('/contacts', 'PageController@Contacts')->name('contacts');

Route::get('/services', 'PageController@Services')->name('services');

Route::get('/author/{key}', PostsByAuthorController::class)->name('posts_by_author');

Route::get('/category/{key}', '\\' . \App\Http\Controllers\Posts_by_categoryController::class)->name('posts_by_category');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('login');