<?php
/**
 * Created by PhpStorm.
 * User: HongXunPan
 * Date: 2020/3/22
 * Time: 0:41
 */

/*
    |--------------------------------------------------------------------------
    | 站点域名配置
    |--------------------------------------------------------------------------
    |
    | 本项目有多个站点
    | 主站点、博客站点 and so on
    | 按需配置
    |
    */
return [

    'main' => env('DOMAIN_MAIN', 'www.kangxuanpeng.com'),

    'blog' => env('DOMAIN_BLOG', 'blog.kangxuanpeng.com'),

    'me' => env('DOMAIN_ME', 'me.kangxuanpeng.com'),

];