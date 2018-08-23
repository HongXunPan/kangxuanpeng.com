<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('posts', 'PostBlogController');
    $router->resource('tags', 'TagBlogController');
    $router->resource('post-tags', 'PostTagBlogController');

    $router->get('/api/posts', 'ApiController@posts');
    $router->get('/api/tags', 'ApiController@tags');
});
