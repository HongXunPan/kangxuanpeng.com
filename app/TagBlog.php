<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TagBlog
 *
 * @property int $tag_id 标签ID
 * @property string $tag_name 标签名称
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\PostBlog[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TagBlog whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TagBlog whereTagName($value)
 * @mixin \Eloquent
 */
class TagBlog extends Model
{

    protected $primaryKey = 'tag_id';

    protected $dateFormat = 'U';

    protected $table = 'tags_blog';

    public $timestamps = false;

    public function posts()
    {
        return $this->belongsToMany('App\PostBlog', 'post_tag_relations_blog', 'tag_id', 'post_id');
    }
}
