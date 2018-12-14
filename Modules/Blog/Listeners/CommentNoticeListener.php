<?php

namespace Modules\Blog\Listeners;

use App\CommentBlog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Blog\Events\CommentNoticeEvent;
use Modules\Blog\Mail\CommentNoticeMail;
use Modules\Blog\Mail\NoticeCommentatorMail;

class CommentNoticeListener
{
    /**
     * Create the event listener.
     *
     * NoticeCommentatorListener constructor.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CommentNoticeEvent  $event
     * @return void
     */
    public function handle(CommentNoticeEvent $event)
    {
        /** @var CommentBlog $comment */
        $comment = $event->comment;
        \Mail::to('inform@kangxuanpeng.com')->send(new CommentNoticeMail($comment->post, $comment));
    }
}
