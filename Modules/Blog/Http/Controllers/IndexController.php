<?php
/**
 * Created by PhpStorm.
 * User: HongXunPan
 * Date: 2018/7/31
 * Time: 14:53
 */

namespace Modules\Blog\Http\Controllers;


use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('blog::index.index');
    }
}