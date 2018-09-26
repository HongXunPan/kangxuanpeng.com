<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PostBlog
 *
 * @property int $post_id 文章ID
 * @property string $post_name 文章标题
 * @property string $slug 文章slug
 * @property string $content 正文md
 * @property int $author_id 作者ID
 * @property int $comment_num 评论数 (冗余)
 * @property int $status 状态 发布or草稿
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CommentBlog[] $comments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TagBlog[] $tags
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog whereCommentNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog wherePostName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostBlog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PostBlog extends Model
{

    protected $dateFormat = 'U';

    protected $table = 'posts_blog';

    protected $primaryKey = 'post_id';

    protected $guarded = [];

    const STATUS_EDITING = 0;
    const STATUS_PUBLISHED = 1;

    public static $status_map = [
        self::STATUS_EDITING => '草稿',
        self::STATUS_PUBLISHED => '已发布',
    ];

    const IS_INDEX_SHOW = 1;
    const IS_INDEX_NOT_SHOW = 0;

    public static $is_index_show_map = [
        self::IS_INDEX_NOT_SHOW => '不显示',
        self::IS_INDEX_SHOW => '显示',
    ];

    public function comments()
    {
        return $this->hasMany('App\CommentBlog', 'post_id');
    }

    public function tags()
    {
        //TODO 注意看第一个参数和第四个参数的对应关系。第三个参数应该为本Model的主键，第四个参数应该为第一个参数Model的主键。 顺序绝对不能反
        return $this->belongsToMany('App\TagBlog', 'post_tag_relations_blog', 'post_id', 'tag_id');
    }

    public function postTags()
    {
        return $this->hasMany('App\PostTagRelationBlog', 'post_id', 'post_id');
    }

    public function getPrevPostAttribute()
    {
        return self::where('post_id', '<', $this->post_id)
            ->whereStatus(self::STATUS_PUBLISHED)
            ->orderBy('post_id', 'desc')
            ->first();
    }

    public function getNextPostAttribute()
    {
        return self::where('post_id', '>', $this->post_id)
            ->whereStatus(self::STATUS_PUBLISHED)
            ->orderBy('post_id', 'asc')
            ->first();
    }

}
