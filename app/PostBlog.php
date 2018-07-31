<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostBlog extends Model
{

    protected $dateFormat = 'U';

    protected $table = 'posts_blog';

    protected $primaryKey = 'post_id';

    protected $guarded = [];

    public function comments()
    {
        return $this->hasMany('App\CommentBlog', 'post_id');
    }

    public function tags()
    {
        //TODO 注意看第一个参数和第四个参数的对应关系。第三个参数应该为本Model的主键，第四个参数应该为第一个参数Model的主键。 顺序绝对不能反
        return $this->belongsToMany('App\TagBlog', 'post_tag_relations_blog', 'post_id', 'tag_id');
    }
}
