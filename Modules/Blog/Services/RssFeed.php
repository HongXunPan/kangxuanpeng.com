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
use HyperDown\Parser;
use Illuminate\Support\Facades\Cache;
use Suin\RSSWriter\Channel;
use Suin\RSSWriter\Feed;
use Suin\RSSWriter\Item;

class RssFeed
{
    private $baseUrl;
    private $rss;

    /**
     * Return the content of the RSS feed
     */
    public function getRSS()
    {
        Cache::clear();
        if (Cache::has('rss-feed')) {
            return Cache::get('rss-feed');
        }

        $this->buildRss();
        Cache::add('rss-feed', $this->rss, 120);

        return $this->rss;
    }

    private function buildRss()
    {
        $feed = new Feed();

        $channel = new Channel();
        $channel
            ->title('Blog-HongXunPan-kangxuanpeng-康宣鹏')
            ->description('康宣鹏,HongXunPan,kangxuanpeng,Blog,博客,website,Index')
            ->url($this->baseUrl)
            ->feedUrl(url('feed.xml'))
//            ->language('en-ZH')
            ->copyright('Copyright 2018, HongXunPan')
            ->pubDate(Carbon::parse('2018-08-28')->getTimestamp())
            ->lastBuildDate(Carbon::now()->getTimestamp())
//            ->ttl(60)
//            ->pubsubhubbub('http://example.com/feed.xml', 'http://pubsubhubbub.appspot.com') // This is optional. Specify PubSubHubbub discovery if you want.
            ->appendTo($feed);

        $this->buildItem($channel);

        $this->rss = $feed->render(); // or echo $feed->render();
    }

    private function buildItem($channel)
    {
        $postList = PostBlog::whereStatus(PostBlog::STATUS_PUBLISHED)->orderBy('created_at', 'desc')->get();

        $md = new Parser();
        $md->_commonWhiteList .= '|center';

        /** @var PostBlog $post */
        foreach ($postList as $post) {
            $tagList = [];
            foreach ($post->tags as $tag) {
                $tagList[] = $tag->tag_name;
            }
            $item = new Item();
            $item
                ->title($post->post_name)
//                ->description(str_limit($md->makeHtml($post->content), 150))
                ->description($md->makeHtml($post->content))
//                ->contentEncoded($md->makeHtml($post->content))
                ->url(url('post', ['id' => $post->post_id, 'slug' => $post->slug]))
                ->category(implode(',', $tagList))
                ->author('HongXunPan')
                ->pubDate($post->created_at->getTimestamp())
                ->guid(url('post', ['id' => $post->post_id, 'slug' => $post->slug]), true)
                ->preferCdata(true)// By this, title and description become CDATA wrapped HTML.
                ->appendTo($channel);
        }

    }
}