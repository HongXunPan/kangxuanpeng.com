<?php

namespace Modules\Blog\Listeners;

use App\CommentBlog;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Blog\Events\NoticeCommentatorEvent;
use Modules\Blog\Mail\NoticeCommentatorMail;

class NoticeCommentatorListener
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
     * @param  NoticeCommentatorEvent  $event
     * @return void
     */
    public function handle(NoticeCommentatorEvent $event)
    {
        /** @var CommentBlog $comment */
        $comment = $event->comment;
//        dd($comment);
        if ($comment->parent_id != 0) {
            \Mail::to($comment->parent->email)->send(new NoticeCommentatorMail($comment->post, $comment, $comment->parent));
        }
    }
}
