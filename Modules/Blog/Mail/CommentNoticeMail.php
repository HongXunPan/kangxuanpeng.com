<?php

namespace Modules\Blog\Mail;

use App\CommentBlog;
use App\PostBlog;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentNoticeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var CommentBlog $comment
     */
    public $comment;

    /**
     * @var PostBlog $post
     */
    public $post;

    /**
     * Create a new message instance.
     *
     * BlogNotice constructor.
     * @param PostBlog $post
     * @param CommentBlog $comment
     */
    public function __construct(PostBlog $post, CommentBlog $comment)
    {
        $this->post = $post;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('blog::mail.commentNotice')->subject('文章 ‘'.$this->post->post_name.'‘ 有了新的留言');
    }
}
