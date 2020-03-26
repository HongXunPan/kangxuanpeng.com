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

Route::group(['domain' => config('domain.main'), 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::group(['domain' => config('domain.blog'), 'middleware' => 'web', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
//    Route::get('/', 'BlogController@index');
    Route::get('/', 'IndexController@index')->name('blog.index');
    Route::redirect('/index', '/', 301);

    Route::get('/tag/{tag_name}', 'IndexController@tagList');
    Route::get('/tag/{tag_name}/{page}', 'IndexController@tagList');

    Route::get('/search', 'IndexController@searchPage');
    Route::any('/search/{keyword}', 'IndexController@search');
    Route::any('/search/{keyword}/{page}', 'IndexController@search');

//    Route::get('/post/{id}/{commentPage?}', 'PostController@postById')->where(['id', '[0-9]+', 'commentPage' => '\bcommentPage-\d+']);
    Route::get('/post/{id}/{slug?}/{commentPage?}', 'PostController@postByIdSlug')->where(['id' => '[0-9]+', 'commentPage' => '\bcommentPage-\d+']);
    Route::get('/post/{slug}', 'PostController@postBySlug');
    Route::post('/post/comment/{id}', 'PostController@comment')->where('id', '\d+');


    Route::get('sitemap.xml', 'IndexController@siteMap');
    Route::get('feed.xml', 'IndexController@feed');

    Route::get('about', 'PostController@about');
    Route::get('website-intro', 'PostController@websiteIntro');

});