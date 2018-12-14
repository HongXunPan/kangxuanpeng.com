<?php

namespace Modules\Blog\Events;

use App\CommentBlog;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CommentNoticeEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;

    /**
     * Create a new event instance.
     *
     * NoticeCommentatorEvent constructor.
     * @param CommentBlog $comment
     */
    public function __construct(CommentBlog $comment)
    {
        //
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
