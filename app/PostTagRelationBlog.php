<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTagRelationBlog extends Model
{

    protected $primaryKey = ['post_id', 'tag_id'];

    public $incrementing = false;

    protected $table = 'post_tag_relations_blog';

    public $timestamps = false;

    //只做新增，不做查询
}
