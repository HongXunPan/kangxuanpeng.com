<?php

Route::group(['domain' => 'blog.kangxuanpeng.com', 'middleware' => 'web', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
    Route::get('/', 'BlogController@index');
    Route::get('index/', 'IndexController@index');

    Route::get('post', ['as' => 'post', 'uses' => 'PostController@index']);

    Route::get('tag/{tag_name}', 'IndexController@tagList');
    Route::get('tag/{tag_name}/{id}', 'IndexController@tagList');

    Route::get('search', 'IndexController@searchPage');
    Route::get('search/{$keyword}', 'IndexController@search');
});
