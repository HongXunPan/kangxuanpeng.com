<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\PostTagRelationBlog
 *
 * @property int $id ID
 * @property int $post_id 文章ID
 * @property int $tag_id 标签ID
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostTagRelationBlog wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\PostTagRelationBlog whereTagId($value)
 * @mixin \Eloquent
 */
class PostTagRelationBlog extends Model
{

//    protected $primaryKey = 'id';

//    public $incrementing = false;

    protected $table = 'post_tag_relations_blog';

    public $timestamps = false;

    //只做新增，不做查询
    public function post()
    {
        return $this->hasOne('App\PostBlog', 'post_id', 'post_id');
    }

    public function tag()
    {
        return $this->hasOne('App\TagBlog', 'tag_id', 'tag_id');
    }
}
