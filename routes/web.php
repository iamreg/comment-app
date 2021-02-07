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

Route::get('/', 'PostsController@view')->name('post-view');

Route::get('/post/comments', 'CommentsController@index')->name('comment-list');

//wrapped in sanitation middleware to sanitize incoming data
Route::group(['middleware' => ['xss.sanitation']], function(){
    Route::post('/post/comment/store', 'CommentsController@store')->name('comment-store');
});
