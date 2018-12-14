<?php

namespace Modules\Blog\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class BlogEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Modules\Blog\Events\NoticeCommentatorEvent' => [
            'Modules\Blog\Listeners\NoticeCommentatorListener',
        ],
        'Modules\Blog\Events\CommentNoticeEvent' => [
            'Modules\Blog\Listeners\CommentNoticeListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
