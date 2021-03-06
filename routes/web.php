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

Route::get('/', 'FrontController@welcome')->name('welcome');
Route::get('/services', 'FrontController@services')->name('services');
Route::get('/blogs', 'FrontController@blogs')->name('blogs');
Route::get('/blogs/category/{category}','FrontController@categoryblogs')->name('categoryblogs');
Route::get('/blogs/tag/{tag}','FrontController@tagblogs')->name('tagblogs');
Route::get('/blogs/user/{user}','FrontController@userblogs')->name('userblogs');
Route::get('/blogs/search','FrontController@searchblogs')->name('searchblogs');
Route::get('/blog-post/{blog}','FrontController@blogpost')->name('blogpost');
Route::get('/contact', 'FrontController@contact')->name('contact');
Route::post('/contactform','FrontController@contactform')->name('contactform');
Route::post('/newsletter','FrontController@newsletter')->name('newsletter');
Route::post('/comment/{blog}', 'FrontController@comment')->name('comment');

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



