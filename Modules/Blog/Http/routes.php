<?php

Route::group(['domain' => 'blog.kangxuanpeng.com', 'middleware' => 'web', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
    Route::get('/', 'BlogController@index');
});
