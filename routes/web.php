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

Route::resource('/user/blogs', 'BlogController')->middleware('auth');
Route::resource('/user/comments','CommentController')->middleware('auth');


Route::resource('/admin/users', 'UserController')->middleware('can:admin-only');
Route::resource('/admin/tags', 'TagController')->middleware('can:admin-only');
Route::resource('/admin/categories','CategoryController')->middleware('can:admin-only');
Route::resource('/admin/clients','ClientController')->middleware('can:admin-only');
Route::resource('/admin/testimonials','TestimonialController')->middleware('can:admin-only');
Route::resource('/admin/services','ServiceController')->middleware('can:admin-only');
Route::resource('/admin/products', 'ProductController')->middleware('can:admin-only');
Route::resource('/admin/texts', 'TextController')->middleware('can:admin-only');
Route::resource('/admin/newsemails', 'NewsemailController')->middleware('can:admin-only');
Route::resource('/admin/images','ImageController')->middleware('can:admin-only');

Route::get('/admin/validation/all','ValidationController@all')->name('valAll')->middleware('can:admin-only');
Route::get('/admin/validation/blogs','ValidationController@blogs')->name('valBlogs')->middleware('can:admin-only');
Route::get('/admin/validation/comments  ','ValidationController@comments')->name('valComments')->middleware('can:admin-only');
Route::put('/admin/validation/blog/{id}','ValidationController@blogvalidation')->name('valBlog')->middleware('can:admin-only');
Route::put('/admin/validation/comment/{id}','ValidationController@commentvalidation')->name('valComment')->middleware('can:admin-only');



