<?php
/**
 * Created by PhpStorm.
 * User: HongXunPan
 * Date: 2018/8/25
 * Time: 13:53
 */

namespace Modules\Blog\Services;

use App\PostBlog;
use App\TagBlog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SiteMap
{
    private $xml = [];
    private $baseUrl = '';

    /**
     * Return the content of the Site Map
     */
    public function getSiteMap()
    {
        Cache::flush();
        if (Cache::has('blog-site-map')) {
            return Cache::get('blog-site-map');
        }

        $siteMap = $this->buildSiteMap();
        Cache::add('blog-site-map', $siteMap, 1);
        return $siteMap;
    }

    /**
     * Build the Site Map
     */
    protected function buildSiteMap()
    {

        $this->baseUrl = trim(url('/'), '/') . '/';

        //各种路由 组合
        $this->__buildTotalSiteMap();
        $this->__buildConstSiteMap();
        $this->__buildTagSiteMap();
        $this->__buildPostSiteMap();


        $this->xml[] = '</urlset>';
        return join("\n", $this->xml);
    }

    protected function __buildUrl($loc, $lastMod = null, $changeFreq = null, $priority = null)
    {
        $this->xml[] = '  <url>';
        $this->xml[] = "    <loc>$loc</loc>";
        $lastMod !== null && $this->xml[] = "    <lastmod>$lastMod</lastmod>";
        $changeFreq !== null && $this->xml[] = "    <changefreq>$changeFreq</changefreq>";
        $priority !== null && $this->xml[] = "    <priority>$priority</priority>";
        $this->xml[] = '  </url>';
    }

    protected function __buildTotalSiteMap()
    {
        $this->xml[] = '<?xml version="1.0" encoding="UTF-8"?' . '>';
        $this->xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        $this->__buildUrl($this->baseUrl, Carbon::now()->timezone('Europe/London')->toW3cString(), 'daily', 1);
    }

    protected function __buildPostSiteMap()
    {
        $postsList = $this->getPostsList();
        /** @var PostBlog $post */
        foreach ($postsList as $post) {
//            $this->__buildUrl("{$this->baseUrl}post/{$post->post_id}/{$post->slug}", $post->updated_at);
            $this->__buildUrl(url('post', ['id' => $post->post_id, 'slug' => $post->slug]),
                Carbon::parse($post->updated_at)->timezone('Europe/London')->toW3cString()
            );
        }
    }

    protected function __buildConstSiteMap()
    {
        $this->__buildUrl(url('search'), null, null,0.8);
    }

    protected function __buildTagSiteMap()
    {
        $tagList = $this->getTagsList();

        /** @var TagBlog $tag */
        foreach ($tagList as $tag) {
            $this->__buildUrl(url('tag', ['tag_name' => $tag->tag_name]), null, null, 0.4);
        }
    }

    protected function getTagsList()
    {
        return TagBlog::all();
    }

    /**
     * Return all the posts orderby created_at
     */
    protected function getPostsList()
    {
        return PostBlog::where(['status' => PostBlog::STATUS_PUBLISHED])
            ->orderBy('updated_at', 'desc')
            ->get();
    }
}