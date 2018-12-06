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
use Illuminate\Routing\Controller;
use Modules\Blog\Services\RssFeed;
use Modules\Blog\Services\SiteMap;

class IndexController extends Controller
{
    public function index()
    {
        $postList = PostBlog::whereStatus(PostBlog::STATUS_PUBLISHED)->where(['is_index_show' => PostBlog::IS_INDEX_SHOW])
            ->orderby('created_at', SORT_DESC)->get();
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
            ->orderBy('created_at', SORT_DESC)->paginate(15, ['*'], 'page', $page);
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

    public function search($keyword, $page = 1)
    {
        $postList = PostBlog::whereStatus(PostBlog::STATUS_PUBLISHED)
            ->where(function ($query) use ($keyword) {
                $query->where('post_name', 'like', "%$keyword%")
                    ->orwhere(function ($query) use ($keyword) {
                        $query->where('slug', 'like', "%$keyword%")  //content
                            ->orWhere(function ($query) use ($keyword) {
                                $query->where('content', 'like', "%$keyword%");
                        })
                        ;
                    });
        })->orderBy('created_at', SORT_DESC)->paginate(15, ['*'], 'page', $page);
        return view('blog::index.tagList', ['tagName' => $keyword, 'page' => 'Search', 'postList' => $postList]);
    }

    public function about()
    {
        return $this->postBySlug('about');
    }

    public function websiteIntro()
    {
        return $this->postBySlug('website-intro');
    }

    public function siteMap(SiteMap $siteMap)
    {
        $map = $siteMap->getSiteMap();

        return response($map)
            ->header('Content-type', 'text/xml');
    }

    public function feed(RssFeed $rssFeed)
    {
        $rss = $rssFeed->getRSS();

        return response($rss)->header('Content-type', 'text/xml');
    }
}