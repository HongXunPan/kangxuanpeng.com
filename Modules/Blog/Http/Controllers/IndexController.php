<?php
/**
 * Created by PhpStorm.
 * User: HongXunPan
 * Date: 2018/7/31
 * Time: 14:53
 */

namespace Modules\Blog\Http\Controllers;


use App\PostBlog;
use App\TagBlog;
use Carbon\Carbon;
use HyperDown\Parser;
use Illuminate\Routing\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $postList = PostBlog::whereStatus(PostBlog::STATUS_PUBLISHED)->orderby('created_at', SORT_DESC)->get();
        /** @var  $post PostBlog */
        $posts = [];
        foreach ($postList as $post) {
            $month = Carbon::parse($post->created_at)->format('M Y');
            $posts[$month][] = $post;
        }
        return view('blog::index.index', ['postList' => $posts]);
    }

    public function tagList($tagName, $page = 1)
    {
        //paginate = 18
        $tag = TagBlog::whereTagName($tagName)->first();
        $postList = $tag->posts()->where('status', PostBlog::STATUS_PUBLISHED)
            ->orderBy('created_at', SORT_DESC)->paginate(6, ['*'], 'page', $page);
        return view('blog::index.tagList', ['tagName' => $tagName, 'postList' => $postList]);
    }

    public function searchPage()
    {
        $tagList = TagBlog::all();
        $counts = [];
        $tags = [];
        /** @var  $tag TagBlog */
        foreach ($tagList as $tag) {
            $count = $tag->posts->count();
            $counts[] = $tag->postNum = $count;
            $tags[] = $tag;
        }
        array_multisort($counts, SORT_DESC, SORT_NUMERIC, $tags);
        return view('blog::index.searchPage', ['tagList' => $tags]);
    }

    public function postById($id = 1)
    {
        $post = PostBlog::whereStatus(PostBlog::STATUS_PUBLISHED)->find($id);
//        $post = [];
        $md = new Parser();
        $md->_commonWhiteList .= '|center';
        return view('blog::index.post', ['post' => $post, 'md' => $md]);
    }
}