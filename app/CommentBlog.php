<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CommentBlog
 *
 * @property int $comment_id 评论ID
 * @property int $post_id 文章ID
 * @property string $content 评论正文md
 * @property int $parent_id 父评论ID
 * @property string $nick_name 评论者昵称
 * @property string $email 评论者email
 * @property string $site 评论者url
 * @property int $status 状态 软删除
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\PostBlog $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CommentBlog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
