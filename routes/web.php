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

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('posts/create', 'Posts\PostController@add');
    
    Route::post('posts/create','Posts\PostController@create');
    
    Route::get('posts', 'Posts\PostController@index');
    
    Route::get('posts/edit', 'Posts\PostController@edit');
   
    Route::post('posts/edit', 'Posts\PostController@update'); 
    
    Route::get('posts/delete', 'Posts\PostController@delete');
    
    Route::get('/', 'UserpostController@index');
    
    Route::post('comments/create', 'CommentsController@create');
    Route::get('comments/create', 'CommentsController@add');
    Route::get('comments/index', 'CommentsController@index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
