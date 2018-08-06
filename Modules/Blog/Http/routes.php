<?php

Route::group(['domain' => 'blog.kangxuanpeng.com', 'middleware' => 'web', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
    Route::get('/', 'BlogController@index');
    Route::get('index/', 'IndexController@index');

    Route::get('tag/{tag_name}', 'IndexController@tagList');
    Route::get('tag/{tag_name}/{page}', 'IndexController@tagList');

    Route::get('search', 'IndexController@searchPage');
    Route::get('search/{$keyword}', 'IndexController@search');

    Route::get('post/{id}', 'IndexController@postByIdSlug')->where('id', '[0-9]+');
    Route::get('post/{id}/{slug}', 'indexController@postByIdSlug')->where(['id' => '[0-9]+']);
    Route::get('post/{slug}', 'indexController@postBySlug');
});
