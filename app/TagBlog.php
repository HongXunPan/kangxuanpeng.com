<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagBlog extends Model
{

    protected $primaryKey = 'tag_id';

    protected $dateFormat = 'U';

    protected $table = 'tags_blog';

    public function posts()
    {
        return $this->belongsToMany('App\PostBlog', 'post_tag_relations_blog', 'tag_id', 'post_id');
    }
}
