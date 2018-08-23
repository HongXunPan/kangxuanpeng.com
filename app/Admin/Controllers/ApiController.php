<?php
/**
 * Created by PhpStorm.
 * User: HongXunPan
 * Date: 2018/8/21
 * Time: 14:07
 */

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\PostBlog;
use App\TagBlog;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function posts(Request $request) {
        $q = $request->get('q');
        return PostBlog::where('post_name', 'like', "%$q%")->paginate(null, ['post_id as id', 'post_name as text']);
    }

    public function tags(Request $request) {
        $q = $request->get('q');
        return TagBlog::where('tag_name', 'like', "%$q%")->paginate(null, ['tag_id as id', 'tag_name as text']);
    }
}