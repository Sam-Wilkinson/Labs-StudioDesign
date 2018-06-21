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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/blogs', function () {
    return view('blog');
});
Route::get('/blog-post', function () {
    return view('blog-post');
});
Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user/blogs', 'BlogController');


Route::resource('/admin/users', 'UserController');


