<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{

    protected $primaryKey = 'comment_id';

    protected $dateFormat = 'U';

    protected $table = 'comments_blog';

    public function post()
    {
        return $this->belongsTo('App\PostBlog', 'post_id');
    }
}
