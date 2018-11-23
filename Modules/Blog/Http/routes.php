<?php

Route::group(['domain' => 'blog.kangxuanpeng.com', 'middleware' => 'web', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
//    Route::get('/', 'BlogController@index');
    Route::get('/', 'IndexController@index');
    Route::redirect('/index', '/', 301);

    Route::get('/tag/{tag_name}', 'IndexController@tagList');
    Route::get('/tag/{tag_name}/{page}', 'IndexController@tagList');

    Route::get('/search', 'IndexController@searchPage');
    Route::any('/search/{keyword}', 'IndexController@search');
    Route::any('/search/{keyword}/{page}', 'IndexController@search');

    Route::get('/post/{id}', 'IndexController@postByIdSlug')->where('id', '[0-9]+');
    Route::get('/post/{id}/{slug}', 'IndexController@postByIdSlug')->where(['id' => '[0-9]+']);
    Route::get('/post/{slug}', 'IndexController@postBySlug');

    Route::get('sitemap.xml', 'IndexController@siteMap');
    Route::get('feed.xml', 'IndexController@feed');

    Route::get('about', 'IndexController@about');
    Route::get('website-intro', 'IndexController@websiteIntro');

});
