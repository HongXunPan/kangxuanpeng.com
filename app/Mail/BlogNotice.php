<?php

namespace App\Mail;

use App\CommentBlog;
use App\PostBlog;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BlogNotice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var CommentBlog $reply
     */
    public $reply;

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
     * @param CommentBlog $reply
     * @param CommentBlog $comment
     */
    public function __construct(PostBlog $post, CommentBlog $reply, CommentBlog $comment)
    {
        $this->post = $post;
        $this->reply = $reply;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('blog::mail.noticeComment')->subject('您在 ‘HongXunPan‘ 个人博客上的留言有了新的回复');
    }
}
