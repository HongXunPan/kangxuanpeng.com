<?php
/**
 * Created by PhpStorm.
 * User: HongXunPan
 * Date: 2018/8/28
 * Time: 11:30
 */

namespace Modules\Blog\Services;


use App\PostBlog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class RssFeed
{
    private $baseUrl;
    private $xml = [];

    /**
     * Return the content of the RSS feed
     */
    public function getRSS()
    {
        Cache::clear();
        if (Cache::has('rss-feed')) {
            return Cache::get('rss-feed');
        }

        $rss = $this->buildRssData();
        Cache::add('rss-feed', $rss, 120);

        return $rss;
    }

    /**
     * Return a string with the feed data
     *
     * @return string
     */
    protected function buildRssData()
    {
        $this->baseUrl = trim(url('/'), '/') . '/';

        $this->xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $this->xml[] = '<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
        $this->xml[] = '<channel>';
        $this->xml[] = '<title>Blog-HongXunPan-kangxuanpeng-康宣鹏</title>';
        $this->xml[] = '<description>康宣鹏,HongXunPan,kangxuanpeng,Blog,博客,website,Index</description>';
//        $this->xml[] = "<url>$this->baseUrl</url>";
        $this->xml[] = '<atom:link href="'. url('feed.xml') .'" rel="self" type="application/rss+xml"/>';
        $this->xml[] = "<link>$this->baseUrl</link>";
        $this->xml[] = '<pubDate>'.Carbon::parse('2018-08-28')->toRfc822String().'</pubDate>';
        $this->xml[] = '<lastBuildDate>'. Carbon::now()->toRfc822String() .'</lastBuildDate>';
        $this->xml[] = '<generator>HongXunPan</generator>';

        $this->__buildPost();


        $this->xml[] = '</channel>';
        $this->xml[] = '</rss>';

//        dd($this->xml);
        return join("\n", $this->xml);
    }

    private function __buildItem(PostBlog $post, $tagList)
    {
        $this->xml[] = '<item>';
        $this->xml[] = '<title>'. $post->post_name. '</title>';
        $this->xml[] = '<link>'. url('post', ['id' => $post->post_id, 'slug' => $post->slug]).'</link>';
        $this->xml[] = '<description>'. str_limit($post->content, 150) .'</description>';
        $this->xml[] = '<pubDate>' . $post->created_at->toRfc822String(). '</pubDate>';
        $this->xml[] = '<author>kangxuanpeng@163.com (HongXunPan)</author>';
        $this->xml[] = '<guid>'. url('post', ['id' => $post->post_id, 'slug' => $post->slug]) .'</guid>';
        $this->xml[] = '<category>'. implode(',', $tagList).'</category>';
        $this->xml[] = '</item>';
    }

    private function __buildPost()
    {
        $postList = PostBlog::whereStatus(PostBlog::STATUS_PUBLISHED)->orderBy('created_at', 'desc')->get();

        /** @var PostBlog $post */
        foreach ($postList as $post) {
            $tagList = [];
            foreach ($post->tags as $tag) {
                $tagList[] = $tag->tag_name;
            }
            $this->__buildItem($post, $tagList);
        }
    }
}